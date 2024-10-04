pipeline {
    agent any

    environment {
        // Set the path to your WordPress project
        WORDPRESS_PROJECT_PATH = '/home/fir3/project/WordPress-Project'
        DOCKER_IMAGE_NAME = 'your-docker-image-name' // Replace with your Docker image name
        DOCKER_REGISTRY = 'your-docker-registry-url' // Replace with your Docker registry URL if needed
    }

    stages {
        stage('Checkout') {
            steps {
                // Checkout the code from your repository
                git 'https://your-repo-url.git' // Replace with your Git repository URL
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    // Build the Docker image
                    sh "docker build -t ${DOCKER_IMAGE_NAME} ${WORDPRESS_PROJECT_PATH}"
                }
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    // Add your testing commands here
                    // Example: sh "phpunit --testsuite Unit"
                }
            }
        }

        stage('Deploy to Docker') {
            steps {
                script {
                    // Stop and remove existing container if it exists
                    sh "docker stop wordpress-container || true"
                    sh "docker rm wordpress-container || true"

                    // Run the new container
                    sh """
                    docker run -d \
                        --name wordpress-container \
                        -p 8080:80 \
                        --env WORDPRESS_DB_HOST=db \
                        --env WORDPRESS_DB_USER=root \
                        --env WORDPRESS_DB_PASSWORD=example \
                        --env WORDPRESS_DB_NAME=wordpress_db \
                        ${DOCKER_IMAGE_NAME}
                    """
                }
            }
        }

        stage('Update Plugins') {
            steps {
                script {
                    // Update WordPress plugins
                    sh """
                    cd ${WORDPRESS_PROJECT_PATH}
                    wp plugin update --all
                    """
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline completed successfully!'
        }
        failure {
            echo 'Pipeline failed. Please check the logs.'
        }
    }
}
