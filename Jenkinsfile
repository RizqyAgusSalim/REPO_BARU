// Jenkinsfile: Versi Final yang telah DIKOREKSI (Menghapus --no-dev)
pipeline {
    agent any
    
    environment {
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
                
                // 1. Unduh composer.phar
                bat "${env.PHP_EXE} -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\""
                bat "${env.PHP_EXE} composer-setup.php"
                bat 'del composer-setup.php' 
                
                // 2. Jalankan composer.phar untuk menginstal semua dependensi (TERMASUK PHPUnit)
                // --- PENTING: --no-dev DIHAPUS ---
                bat "${env.PHP_EXE} composer.phar install --prefer-dist" 
            }
        }
        
        stage('Unit Test') {
            steps {
                echo 'Menjalankan Unit Tests menggunakan PHPUnit...'
                // Perbaikan: Cek folder dulu sebelum buat, agar tidak error jika sudah ada
                bat '''
                    if not exist target\\junit-reports mkdir target\\junit-reports
                '''
                bat "${env.PHP_EXE} .\\vendor\\bin\\phpunit --log-junit target\\junit-reports\\test-results.xml tests\\" 
            }
        }
        
        stage('Publish Test Results') {
            steps {
                echo 'Mempublikasikan hasil tes ke Jenkins...'
                junit 'target/junit-reports/test-results.xml' 
            }
        }
        
        stage('Execute PHP Script') {
            steps {
                echo 'Menjalankan skrip utama...'
                bat "${env.PHP_EXE} index.php"
            }
        }
    } 
    
    post {
        always {
            echo 'Mengarsipkan artifact penting...'
            archiveArtifacts artifacts: 'target/junit-reports/test-results.xml', onlyIfSuccessful: true
        }
        success {
            echo 'Pipeline Selesai dengan SUKSES! 🥳'
        }
        failure {
            echo 'Pipeline GAGAL! 😢 Periksa log Unit Test.'
        }
    }
}