// Jenkinsfile (FINAL VERSION)
pipeline {
    agent any

    stages { 

        // --- Tahap 1: Checkout Code (Fix: branch) ---
        stage('Checkout Code') {
            steps {
                echo 'Mengambil kode dari Git...'
                git url: 'https://github.com/RizqyAgusSalim/REPO_BARU', branch: 'main'
            }
        } 
        
        // --- Tahap 2: Install Dependencies (Menggunakan sh) ---
        stage('Install Dependencies') {
            steps {
                echo 'Menginstal Composer dependencies...'
                sh 'composer install --no-dev --prefer-dist' 
            }
        }
        
        // --- Tahap 3: Unit Test (Menggunakan sh) ---
        stage('Unit Test') {
            steps {
                echo 'Menjalankan Unit Tests menggunakan PHPUnit...'
                sh 'mkdir -p target/junit-reports' // -p berfungsi di sh
                sh './vendor/bin/phpunit --log-junit target/junit-reports/test-results.xml tests/'
            }
        }
        
        // --- Tahap 4: Publish Test Results ---
        stage('Publish Test Results') {
            steps {
                echo 'Mempublikasikan hasil tes ke Jenkins...'
                junit 'target/junit-reports/test-results.xml' 
            }
        }
        
        // --- Tahap 5: Eksekusi Skrip PHP (Menggunakan sh) ---
        stage('Execute PHP Script') {
            steps {
                echo 'Menjalankan skrip utama menggunakan sh...'
                sh 'php index.php' // Perintah dikirim melalui sh (Git Bash)
            }
        }

    } 
}