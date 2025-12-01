// Jenkinsfile: Versi Final menggunakan BAT dan Jalur PHP Mutlak
pipeline {
    agent any
    
    // Konfigurasi Environment Variable (Opsional, tapi membantu)
    environment {
        // Ganti jalur ini dengan PATH KE PHP.EXE di komputer Anda!
        PHP_EXE = 'C:\\xampp\\php\\php.exe' 
    }

    stages { 
        stage('Checkout Code') {
            steps {
                echo 'Mengambil kode dari Git...'
                git url: 'https://github.com/RizqyAgusSalim/REPO_BARU', branch: 'main'
            }
        } 
        
        stage('Install Dependencies') {
            steps {
                echo 'Mengunduh dan Menginstal Composer dependencies...'
                
                // 1. Unduh composer.phar ke workspace Jenkins menggunakan PHP mutlak
                // Langkah ini memastikan file composer.phar ada di workspace.
                bat "${env.PHP_EXE} -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\""
                bat "${env.PHP_EXE} composer-setup.php"
                bat 'del composer-setup.php' // Hapus file setup
                
                // 2. Jalankan composer.phar untuk menginstal dependensi (vendor/)
                bat "${env.PHP_EXE} composer.phar install --no-dev --prefer-dist" 
            }
        }
        
        stage('Unit Test') {
            steps {
                echo 'Menjalankan Unit Tests menggunakan PHPUnit...'
                // 1. Buat folder untuk hasil tes
                bat 'mkdir target\\junit-reports' 
                
                // 2. Jalankan PHPUnit menggunakan PHP mutlak
                // PHPUnit executable berada di .\\vendor\\bin\\phpunit
                bat "${env.PHP_EXE} .\\vendor\\bin\\phpunit --log-junit target\\junit-reports\\test-results.xml tests\\" 
            }
        }
        
        stage('Publish Test Results') {
            steps {
                echo 'Mempublikasikan hasil tes ke Jenkins...'
                // Jenkins JUnit step bisa membaca file XML yang dihasilkan di atas
                junit 'target/junit-reports/test-results.xml' 
            }
        }
        
        stage('Execute PHP Script') {
            steps {
                echo 'Menjalankan skrip utama...'
                // Jalankan skrip utama (index.php) menggunakan PHP mutlak
                bat "${env.PHP_EXE} index.php"
            }
        }
    } 
}