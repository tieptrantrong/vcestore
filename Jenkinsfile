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
            
			withCredentials([usernamePassword(credentialsId: '	mysql-database', usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]) {
                mysqlUser = $USERNAME
                mysqlPw = $PASSWORD
                sh "docker exec -it $containerMysql /bin/bash mysql -u $USERNAME -p vcepro < /opt/script/last-update.sql"
                sh "$PASSWORD"
            }
            sh "exit;"
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
