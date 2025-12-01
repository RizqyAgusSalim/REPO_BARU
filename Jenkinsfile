// Jenkinsfile (FINAL VERSION - KEMBALI MENGGUNAKAN 'sh')
pipeline {
    agent any
    stages { 
        stage('Checkout Code') {
            steps {
                echo 'Mengambil kode dari Git...'
                git url: 'https://github.com/RizqyAgusSalim/REPO_BARU', branch: 'main'
            }
        } 
        
        // Tahap 2: Menggunakan sh
        stage('Install Dependencies') {
            steps {
                echo 'Menginstal Composer dependencies...'
                sh 'composer install --no-dev --prefer-dist' // KEMBALI KE sh
            }
        }
        
        // Tahap 3: Menggunakan sh
        stage('Unit Test') {
            steps {
                echo 'Menjalankan Unit Tests menggunakan PHPUnit...'
                sh 'mkdir -p target/junit-reports' // KEMBALI KE sh
                sh './vendor/bin/phpunit --log-junit target/junit-reports/test-results.xml tests/' // KEMBALI KE sh
            }
        }
        
        // Tahap 4: Tetap
        stage('Publish Test Results') {
            steps {
                echo 'Mempublikasikan hasil tes ke Jenkins...'
                junit 'target/junit-reports/test-results.xml' 
            }
        }
        
        // Tahap 5: Menggunakan sh
        stage('Execute PHP Script') {
            steps {
                echo 'Menjalankan skrip utama menggunakan sh...'
                sh 'php index.php' // KEMBALI KE sh
            }
        }
    } 
}