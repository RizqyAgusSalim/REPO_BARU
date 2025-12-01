// Tugas jenkins/Jenkinsfile (VERSI FINAL YANG BENAR)
pipeline {
    agent any

    stages { 

        // --- Tahap 1: Mengambil Kode dari GitHub ---
        stage('Checkout Code') {
            steps {
                echo 'Mengambil kode dari Git...'
                // URL sudah BENAR
                git url: 'https://github.com/RizqyAgusSalim/REPO_BARU', branch:'main'
            }
        } 
        
        // --- Tahap 2: Instalasi Dependensi (PHPUnit) ---
        stage('Install Dependencies') {
            steps {
                echo 'Menginstal Composer dependencies...'
                sh 'composer install --no-dev --prefer-dist' 
            }
        }
        
        // --- Tahap 3: Menjalankan Unit Test ---
        stage('Unit Test') {
            steps {
                echo 'Menjalankan Unit Tests menggunakan PHPUnit...'
                sh 'mkdir -p target/junit-reports'
                sh './vendor/bin/phpunit --log-junit target/junit-reports/test-results.xml tests/'
            }
        }
        
        // --- Tahap 4: Publikasi Hasil Tes ke Jenkins ---
        stage('Publish Test Results') {
            steps {
                echo 'Mempublikasikan hasil tes ke Jenkins...'
                junit 'target/junit-reports/test-results.xml' 
            }
        }
        
        // --- Tahap 5: Eksekusi Skrip PHP (Sesuai Permintaan Tugas) ---
        stage('Execute PHP Script') {
            steps {
                echo 'Menjalankan skrip utama menggunakan Powershell...'
                powershell 'php index.php'
            }
        }

    } // Penutup blok stages
} // Penutup blok pipeline