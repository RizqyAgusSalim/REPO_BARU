// Jenkinsfile (FINAL VERSION - USING 'bash')
pipeline {
    agent any
    stages { 
        stage('Checkout Code') {
            steps {
                echo 'Mengambil kode dari Git...'
                git url: 'https://github.com/RizqyAgusSalim/REPO_BARU', branch: 'main'
            }
        } 
        
        // Tahap 2: Menggunakan bash
        stage('Install Dependencies') {
            steps {
                echo 'Menginstal Composer dependencies...'
                bash 'composer install --no-dev --prefer-dist' // UBAH sh MENJADI bash
            }
        }
        
        // Tahap 3: Menggunakan bash
        stage('Unit Test') {
            steps {
                echo 'Menjalankan Unit Tests menggunakan PHPUnit...'
                bash 'mkdir -p target/junit-reports' // UBAH sh MENJADI bash
                bash './vendor/bin/phpunit --log-junit target/junit-reports/test-results.xml tests/' // UBAH sh MENJADI bash
            }
        }
        
        // Tahap 4: Tetap (junit adalah Jenkins Step)
        stage('Publish Test Results') {
            steps {
                echo 'Mempublikasikan hasil tes ke Jenkins...'
                junit 'target/junit-reports/test-results.xml' 
            }
        }
        
        // Tahap 5: Menggunakan bash
        stage('Execute PHP Script') {
            steps {
                echo 'Menjalankan skrip utama menggunakan bash...'
                bash 'php index.php' // UBAH sh MENJADI bash
            }
        }
    } 
}