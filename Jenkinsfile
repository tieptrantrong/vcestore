def image='vcetop-git'
def container='vcetop-git'
node ("web-server"){
    try {
        stage("Check out git And Build Image"){
            checkout scm
            dockertransactionImage = docker.build(image + ":$BUILD_NUMBER", "-f Dockerfile .")
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

