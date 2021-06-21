def image='vcetop-git'
def container='vcetop-git'
def containerMysql='mysql1'
def mysqlpw='mysql1'
def mysqlUser=''
def mysqlPw=''
node ("web-server"){
    try {
        stage("Check out git And Build Image"){
            checkout scm
            dockertransactionImage = docker.build(image + ":$BUILD_NUMBER", "-f Dockerfile .")
        }
		
		stage("Run Sql update"){
            sh "docker cp sql-script/last-update.sql mysql1:/opt/script/last-update.sql"
            sh "docker cp sql-script/run.sh mysql1:/opt/script"
            sh "docker exec mysql1 /bin/bash chmod +x /opt/script/run.sh"
            sh "docker exec mysql1 /bin/bash /opt/script/run.sh"
        }
		
		stage('Delete Docker Container if exists') {
            // stop and remove logs container
            try{
                sh "docker container stop $container"
                sh "docker container rm $container"
                echo "Delete $container Done"
            } catch(Exception e){
                echo " $container not exists or not running"
            }
        }
		
		stage("Run Docker Image"){
            try{
                sh "docker run -d -p 80:8080 --restart always --name $container $image:$BUILD_NUMBER"
            } catch(e){
                echo "Run $container failure"
            }
        }
        
    }catch (e) {
        currentBuild.result = "FAILED"
        throw e
    } finally {

    }
}
