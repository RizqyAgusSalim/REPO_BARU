// Jenkinsfile (FINAL FINAL FINAL VERSION - MENGGUNAKAN 'bat')
pipeline {
    agent any
    stages { 
        // ... Checkout Code (Tahap 1)
        
        // Tahap 2: Menggunakan bat
        stage('Install Dependencies') {
            steps {
                echo 'Menginstal Composer dependencies...'
                bat 'composer install --no-dev --prefer-dist' 
            }
        }
        
        // Tahap 3: Menggunakan bat
        stage('Unit Test') {
            steps {
                echo 'Menjalankan Unit Tests menggunakan PHPUnit...'
                // Perintah Windows Command Prompt (bat):
                bat 'mkdir target\\junit-reports' 
                bat '.\\vendor\\bin\\phpunit --log-junit target\\junit-reports\\test-results.xml tests\\' // Gunakan backslash \
            }
        }
        
        // Tahap 4: Tetap
        stage('Publish Test Results') {
            steps {
                echo 'Mempublikasikan hasil tes ke Jenkins...'
                junit 'target/junit-reports/test-results.xml' 
            }
        }
        
        // Tahap 5: Menggunakan bat
        stage('Execute PHP Script') {
            steps {
                echo 'Menjalankan skrip utama menggunakan bat...'
                bat 'php index.php'
            }
        }
    } 
}