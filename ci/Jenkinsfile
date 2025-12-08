@Library('jenkins-shared') _

pipeline {
    agent any
    
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        
        stage('Build') {
            steps {
                echo 'Building...'
                // Tes étapes de build ici
            }
        }
        
        stage('Test') {
            steps {
                echo 'Testing...'
                // Tes étapes de test ici
            }
        }
    }
    
    post {
        success {
            echo 'Build completed successfully!'
        }
        
        failure {
            echo 'Build failed!'
        }

        always {
            // Appel à ta Shared Library pour notifier Spring Boot
            notifySpringBoot()
        }
    }
}