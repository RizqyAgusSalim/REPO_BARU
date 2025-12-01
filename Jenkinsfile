// Jenkinsfile (FINAL VERSION - BAT + JALUR PHP MUTLAK)
pipeline {
    agent any
    stages { 
        stage('Checkout Code') {
            steps {
                echo 'Mengambil kode dari Git...'
                git url: 'https://github.com/RizqyAgusSalim/REPO_BARU', branch: 'main'
            }
        } 
        
        // Tahap 2: Menggunakan bat (memanggil PHP dengan jalur penuh)
        stage('Install Dependencies') {
            steps {
                echo 'Menginstal Composer dependencies...'
                // Catatan: composer install akan mencoba memanggil php.exe
                // Jika "composer" (tanpa .exe) tidak ada di PATH, Anda harus panggil melalui php.exe
                // Kita gunakan PHP mutlak untuk menjalankan Composer:
                bat 'C:\\xampp\\php\\php.exe composer.phar install --no-dev --prefer-dist' 
            }
        }
        
        // Tahap 3: Menggunakan bat (memanggil PHPUnit dengan jalur penuh PHP)
        stage('Unit Test') {
            steps {
                echo 'Menjalankan Unit Tests menggunakan PHPUnit...'
                // Perintah Windows Command Prompt (bat):
                bat 'mkdir target\\junit-reports' 
                // PENTING: Gunakan jalur PHP mutlak untuk menjalankan PHPUnit executable
                bat 'C:\\xampp\\php\\php.exe .\\vendor\\bin\\phpunit --log-junit target\\junit-reports\\test-results.xml tests\\' 
            }
        }
        
        // Tahap 4: Tetap (JUnit tidak memerlukan PHP)
        stage('Publish Test Results') {
            steps {
                echo 'Mempublikasikan hasil tes ke Jenkins...'
                junit 'target/junit-reports/test-results.xml' 
            }
        }
        
        // Tahap 5: Menggunakan bat (memanggil PHP dengan jalur penuh)
        stage('Execute PHP Script') {
            steps {
                echo 'Menjalankan skrip utama menggunakan bat...'
                // PENTING: Gunakan jalur PHP mutlak untuk menjalankan index.php
                bat 'C:\\xampp\\php\\php.exe index.php'
            }
        }
    } 
}