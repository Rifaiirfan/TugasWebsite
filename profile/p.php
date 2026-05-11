<?php
// DATA PROFIL 1
$nama_lengkap1 = "Happy Cantika Putri";
$nim1          = "4.31.24.2.09";
$no_hp1        = "085602543350";
$asal_sekolah1 = "SMK Negeri 7 Semarang";
$jurusan1      = "Teknik Elektronika Daya dan Komunikasi";
$file_foto1    = "assets/img/happy.jpg";

// DATA PROFIL 2
$nama_lengkap2 = "Hilwa Mutia Qumi";
$nim2          = "4.31.24.2.12";
$no_hp2        = "0882006033345";
$asal_sekolah2 = "SMA Negeri 9 Semarang";
$jurusan2      = "IPA";
$file_foto2    = "assets/img/hilwa.jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>🌸 Profil Mahasiswa - Aplikasi Manajemen Air 🌸</title>
    
    <!-- Anime Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <!-- Anime CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-attachment: fixed;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Anime Particles Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            z-index: -1;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }

        /* Navbar Anime Style */
        .navbar {
            background: linear-gradient(45deg, #ff6b6b, #feca57, #ff9ff3, #54a0ff) !important;
            background-size: 400% 400% !important;
            animation: gradientShift 3s ease infinite !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .navbar-brand {
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            color: #fff !important;
        }

        /* Main Container */
        main {
            padding: 2rem 0;
            position: relative;
        }

        /* Anime Cards */
        .anime-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            box-shadow: 
                0 25px 50px rgba(0,0,0,0.2),
                0 0 0 1px rgba(255,255,255,0.5) inset;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
            flex: 1;              /* 🔥 bikin lebar sama */
            height: 100%;
        }

        .anime-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.6s;
        }

        .anime-card:hover::before {
            left: 100%;
        }

        .anime-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 
                0 35px 70px rgba(0,0,0,0.3),
                0 0 0 1px rgba(255,255,255,0.8) inset;
        }

        /* Card Header */
        .card-header {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
            border: none !important;
            border-radius: 25px 25px 0 0 !important;
            position: relative;
            overflow: hidden;
        }

        .card-header::after {
            content: '✨';
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            animation: sparkle 2s infinite;
        }

        @keyframes sparkle {
            0%, 100% { transform: scale(1) rotate(0deg); opacity: 1; }
            50% { transform: scale(1.3) rotate(180deg); opacity: 0.7; }
        }

        .card-header h3 {
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            color: #6a0dad;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
            position: relative;
            z-index: 2;
        }

        /* Profile Image */
        .profile-img {
            width: 160px !important;
            height: 160px !important;
            border: 5px solid #fff;
            box-shadow: 
                0 15px 35px rgba(0,0,0,0.2),
                0 0 0 5px rgba(255,182,193,0.5);
            transition: all 0.4s ease;
            object-fit:cover;
            position: relative;
        }

        .profile-img:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 
                0 25px 50px rgba(0,0,0,0.3),
                0 0 0 8px rgba(255,182,193,0.8);
        }

        .profile-img::after {
            content: '💖';
            position: absolute;
            bottom: -10px;
            right: -10px;
            font-size: 20px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Table Styling */
        .profile-table th {
            display: inline-block;
            width: 140px; /* diperbesar biar konsisten */
            text-align: left; /* jangan center biar sejajar */
            color: #6a0dad;
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            border-radius: 15px;
            margin-bottom: 10px;
            padding: 10px;
        }

        .profile-table td {
            color: #2c3e50;
            font-weight: 500;
            padding: 8px 10px;
            font-size: 1rem;
            vertical-align: middle; /* perbaikan di sini */
            text-align: left;     /* bikin rata kiri */
            padding-left: 10px;
        }

        /* Back Button */
        .back-btn {
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            border: none;
            border-radius: 50px;
            padding: 15px 40px;
            font-weight: 600;
            font-size: 1.1rem;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 30px rgba(255,107,107,0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .back-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .back-btn:hover::before {
            left: 100%;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255,107,107,0.6);
        }

        /* Footer */
        footer {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255,255,255,0.2);
            margin-top: 3rem;
        }

        .footer-text {
            color: rgba(255,255,255,0.9);
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-img {
                width: 140px !important;
                height: 140px !important;
            }
            
            .anime-card {
                margin-bottom: 2rem;
            }
        }

        /* Loading Animation */
        .fade-in {
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }

        .social-buttons {
                display: flex;
                gap: 12px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .social-btn {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                text-decoration: none;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255,255,255,0.15);
                flex-shrink: 0;
                position: relative;
                overflow: hidden;
            }

            .social-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
                transition: left 0.5s;
            }

            .social-btn:hover::before {
                left: 100%;
            }

            .social-btn:hover {
                transform: translateY(-3px) scale(1.1);
                box-shadow: 0 12px 32px rgba(255,255,255,0.25);
                border-color: rgba(255,255,255,0.5);
            }

            .social-title {
                font-size: 12px;
                margin-bottom: 18px;
                padding-bottom: 8px;
                opacity: 0.8;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                position: relative;
                display: block;
                text-align: center; /* ✅ INI YANG PENTING! */
            }

            .social-section {
                padding: 24px 32px 15px; /* ✅ Bottom 48px */
                margin-bottom: 5px;     /* ✅ Extra spacing */
                text-align: center;
                border-top: 1px solid rgba(255,255,255,0.1);
                background: rgba(255,255,255,0.03);
                border-radius: 0 0 24px 24px; /* Rounded bottom */
            }

            .social-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 40px;
                height: 1px;
                background: linear-gradient(90deg, transparent, #ffffff, transparent);
            }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .anime-card:nth-child(1) { animation-delay: 0.1s; }
        .anime-card:nth-child(2) { animation-delay: 0.2s; }
    </style>
</head>

<body>
    <!-- Anime Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark">
        <a class="navbar-brand ps-3" href="#">
            <i class="fas fa-tint me-2"></i>🌊 Aplikasi Manajemen Air 🌊
        </a>
    </nav>

    <div id="layoutSidenav_content" style="padding-left: 0;">
        <main>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    
                    <!-- Profil 1 -->
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card anime-card shadow-lg fade-in">
                            <div class="card-header py-4 text-center">
                                <h3>🌸 Profil Mahasiswa 1 🌸</h3>
                            </div>
                            <div class="card-body text-center p-4">
                                <img src="<?php echo $file_foto1; ?>" alt="Foto Profil 1" 
                                     class="img-thumbnail rounded-circle mb-4 profile-img">
                                
                                <table class="table table-borderless profile-table mx-auto w-75">
                                    <tbody>
                                        <tr>
                                            <th><i class="fas fa-user me-2 text-primary"></i>Nama</th>
                                            <td>: <?php echo $nama_lengkap1; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-id-card me-2 text-success"></i>NIM</th>
                                            <td>: <?php echo $nim1; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-phone me-2 text-info"></i>No. HP</th>
                                            <td>: <?php echo $no_hp1; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-school me-2 text-warning"></i>Asal Sekolah</th>
                                            <td>: <?php echo $asal_sekolah1; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-graduation-cap me-2 text-danger"></i>Jurusan</th>
                                            <td>: <?php echo $jurusan1; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="social-section">
                                <div class="social-title">Sosial Media</div>
                                <div class="social-buttons">
                                    <a href="https://wa.me/6281328296017" class="social-btn social-whatsapp" target="_blank" title="WhatsApp" rel="noopener">📱</a>
                                    <a href="https://instagram.com/irfan_rifai" class="social-btn social-instagram" target="_blank" title="Instagram" rel="noopener">📸</a>
                                    <a href="https://tiktok.com/@irfan_rifai" class="social-btn social-tiktok" target="_blank" title="TikTok" rel="noopener">🎵</a>
                                    <a href="https://twitter.com/irfan_rifai" class="social-btn social-twitter" target="_blank" title="Twitter" rel="noopener">🐦</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profil 2 -->
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card anime-card shadow-lg fade-in">
                            <div class="card-header py-4 text-center">
                                <h3>🌺 Profil Mahasiswa 2 🌺</h3>
                            </div>
                            <div class="card-body text-center p-4">
                                <img src="<?php echo $file_foto2; ?>" alt="Foto Profil 2" 
                                     class="img-thumbnail rounded-circle mb-4 profile-img">
                                
                                <table class="table table-borderless profile-table mx-auto w-75">
                                    <tbody>
                                        <tr>
                                            <th><i class="fas fa-user me-2 text-primary"></i>Nama</th>
                                            <td>: <?php echo $nama_lengkap2; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-id-card me-2 text-success"></i>NIM</th>
                                            <td>: <?php echo $nim2; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-phone me-2 text-info"></i>No. HP</th>
                                            <td>: <?php echo $no_hp2; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-school me-2 text-warning"></i>Asal Sekolah</th>
                                            <td>: <?php echo $asal_sekolah2; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-graduation-cap me-2 text-danger"></i>Jurusan</th>
                                            <td>: <?php echo $jurusan2; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="social-section">
                                <div class="social-title">Sosial Media</div>
                                <div class="social-buttons">
                                    <a href="https://wa.me/6281328296017" class="social-btn social-whatsapp" target="_blank" title="WhatsApp" rel="noopener">📱</a>
                                    <a href="https://instagram.com/irfan_rifai" class="social-btn social-instagram" target="_blank" title="Instagram" rel="noopener">📸</a>
                                    <a href="https://tiktok.com/@irfan_rifai" class="social-btn social-tiktok" target="_blank" title="TikTok" rel="noopener">🎵</a>
                                    <a href="https://twitter.com/irfan_rifai" class="social-btn social-twitter" target="_blank" title="Twitter" rel="noopener">🐦</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <!-- Back Button -->
                <div class="row mt-5 mb-5">
                    <div class="col-12 text-center">
                        <a href="login/index.php" class="back-btn">
                            <i class="fas fa-arrow-left"></i> Kembali ke Login ✨
                        </a>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- Anime Footer -->
        <footer class="py-4 mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="footer-text">Copyright &copy; 🌸 Aplikasi Manajemen Air 2023 ✨</div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <script>
        // Add stagger animation on load
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.anime-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>