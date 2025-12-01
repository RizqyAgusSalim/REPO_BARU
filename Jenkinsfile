// Tugas jenkins/Jenkinsfile
pipeline {
    agent any
        // --- Tahap 1: Mengambil Kode dari GitHub ---
    stage('Checkout Code') {
        steps {
            echo 'Mengambil kode dari Git...'
        // BAGIAN INI BENAR:
        git url: 'https://github.com/RizqyAgusSalim/REPO_BARU'
            }
        }// Tugas jenkins/Jenkinsfile (VERSI KOREKSI)
pipeline {
    agent any

    // BLOK INI HILANG, SEKARANG DITAMBAHKAN
    stages { 

        // --- Tahap 1: Mengambil Kode dari GitHub ---
        stage('Checkout Code') {
            steps {
                echo 'Mengambil kode dari Git...'
                // URL Sudah Benar
                git url: 'https://github.com/RizqyAgusSalim/REPO_BARU' 
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
        
        // --- Tahap 2: Instalasi Dependensi (PHPUnit) ---
        stage('Install Dependencies') {
            steps {
                echo 'Menginstal Composer dependencies...'
                // Composer akan menginstal PHPUnit dan dependensi lain
                sh 'composer install --no-dev --prefer-dist' 
            }
        }
        
        // --- Tahap 3: Menjalankan Unit Test ---
        stage('Unit Test') {
            steps {
                echo 'Menjalankan Unit Tests menggunakan PHPUnit...'
                // Menjalankan tes dan membuat file hasil XML (test-results.xml)
                sh 'mkdir -p target/junit-reports'
                sh './vendor/bin/phpunit --log-junit target/junit-reports/test-results.xml tests/'
            }
        }
        
        // --- Tahap 4: Publikasi Hasil Tes ke Jenkins ---
        stage('Publish Test Results') {
            steps {
                echo 'Mempublikasikan hasil tes ke Jenkins...'
                // Jenkins membaca file XML dan menampilkan grafis hasil tes
                junit 'target/junit-reports/test-results.xml' 
            }
        }
        
        // --- Tahap 5: Eksekusi Skrip PHP (Sesuai Permintaan Tugas) ---
        stage('Execute PHP Script') {
            steps {
                echo 'Menjalankan skrip utama menggunakan Powershell...'
                // Perintah yang diminta: menjalankan index.php
                powershell 'php index.php'
            }
        }
    }
}