<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa - Yin Yang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', -apple-system, sans-serif;
            min-height: 100vh;
            padding: 40px 20px 80px 20px; /* Tambah bottom padding */
            position: relative;
            /* ✅ FIX: BISA SCROLL - HAPUS overflow: hidden */
            background: #000000;
            color: #ffffff;
            line-height: 1.6;
        }

        /* YIN YANG BACKGROUND - FULL SCREEN */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            border-radius: 50%;
            background: 
                conic-gradient(from 0deg, #ffffff 0deg, #ffffff 180deg, #000000 180deg, #000000 360deg);
            animation: yinYangRotate 25s linear infinite;
            z-index: -2;
            opacity: 0.12;
        }

        body::after {
            content: '';
            position: fixed;
            top: -30%;
            left: -30%;
            width: 160%;
            height: 160%;
            background: 
                radial-gradient(circle at 50% 0%, rgba(255,255,255,0.08) 0%, transparent 50%),
                radial-gradient(circle at 50% 100%, rgba(0,0,0,0.3) 0%, transparent 50%);
            border-radius: 50%;
            animation: yinYangRotate 25s linear infinite reverse;
            z-index: -1;
            opacity: 0.2;
        }

        @keyframes yinYangRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, rgba(10,10,10,0.9) 100%);
            z-index: -1;
        }

        .back-to-login {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: rgba(255,255,255,0.95);
            border: 2px solid #ffffff;
            color: #000000;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 8px 32px rgba(255,255,255,0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            backdrop-filter: blur(20px);
        }

        .back-to-login:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 16px 48px rgba(255,255,255,0.3);
            background: #ffffff;
        }

        .back-to-login::after {
            content: 'Kembali ke Login';
            position: absolute;
            bottom: 75px;
            right: 0;
            background: rgba(0,0,0,0.9);
            color: #ffffff;
            padding: 10px 16px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 500;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .back-to-login:hover::after {
            opacity: 1;
            visibility: visible;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 50px;
            justify-items: center;
            position: relative;
            z-index: 10;
        }

        .profile-card {
            background: rgba(26,26,26,0.95);
            border-radius: 30px;
            box-shadow: 
                0 32px 64px rgba(0,0,0,0.5),
                0 0 0 1px rgba(255,255,255,0.1);
            width: 100%;
            max-width: 700px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255,255,255,0.15);
            backdrop-filter: blur(30px);
        }

        /* 🔥 ANIMASI MASUK PROFILE */
        .profile-card {
            opacity: 0;                    /* ✅ Start invisible */
            transform: translateY(50px);   /* ✅ Start dari bawah */
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        .profile-card:nth-child(1) { animation-delay: 0.2s; }  /* Card 1 lambat 0.2s */
        .profile-card:nth-child(2) { animation-delay: 0.4s; }  /* Card 2 lambat 0.4s */

        /* Title juga ikut animasi */
        .title-section {
            opacity: 0;
            transform: translateY(-30px);
            animation: fadeInDown 0.6s ease 0.1s both;
        }

        /* Keyframes animasi */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Info items stagger */
        .info-item {
            opacity: 0;
            transform: translateX(-20px);
            animation: slideInLeft 0.5s ease forwards;
        }

        .info-item:nth-child(1) { animation-delay: 0.6s; }
        .info-item:nth-child(2) { animation-delay: 0.7s; }
        .info-item:nth-child(3) { animation-delay: 0.8s; }
        .info-item:nth-child(4) { animation-delay: 0.9s; }
        .info-item:nth-child(5) { animation-delay: 1.0s; }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

       .profile-card:hover {
        transform: translateY(-12px) scale(1.02) !important; /* ✅ !important override animasi */
        }

        .profile-image {
            object-fit: cover;
            display: block;
            transition: all 0.3s ease;
        }

        .card-1 .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 24px 24px 24px 24px;
            margin: 32px auto 20px;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .card-2 .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 24px 24px 24px 24px;
            margin: 32px auto 20px;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .card-3 .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 24px 24px 24px 24px;
            margin: 32px auto 20px;
            border: 2px solid rgba(255,255,255,0.3);
        }


        .profile-header {
            text-align: center;
            padding: 28px 32px;
            background: linear-gradient(180deg, rgba(255,255,255,0.08) 0%, transparent 100%);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .profile-header h2 {
            font-size: 28px;
            margin-bottom: 6px;
            font-weight: 700;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .profile-header .kelas {
            font-size: 16px;
            opacity: 0.85;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #ffffff;
        }

        .info-list {
            list-style: none;
            padding: 0 32px 24px; /* RAPAT */
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-top: 15px;
            margin-bottom: 15px; /* RAPAT */
            padding: 14px 18px;  /* RAPAT */
            background: rgba(255,255,255,0.04);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.08);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .info-item:hover {
            background: rgba(255,255,255,0.12);
            transform: translateX(8px);
            border-color: rgba(255,255,255,0.2);
        }

        .info-icon {
            font-size: 20px;
            margin-right: 16px;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.15);
            flex-shrink: 0;
        }

        .info-text h3 {
            font-size: 13px;
            margin-bottom: 2px;
            opacity: 0.8;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-text p {
            font-size: 16px;
            font-weight: 600;
        }

        .title-section {
            text-align: center;
            margin-bottom: 60px;
        }

        .title-section h1 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @media (max-width: 900px) {
            .container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
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

            /* GRADIENT LOGO ASLI */
            .social-whatsapp { 
                background: linear-gradient(135deg, #25D366 0%, #128C7E 50%, #25D366 100%);
            }
            .social-instagram { 
                background: linear-gradient(135deg, #F77737 0%, #E4405F 25%, #833AB4 50%, #C13584 75%, #F77737 100%);
            }
            .social-telegram { 
                background: linear-gradient(135deg, #0088CC 0%, #229ED9 100%);
            }
            .social-tiktok { 
                background: linear-gradient(135deg, #000000 0%, #FF0050 100%);
            }
            .social-twitter { 
                background: linear-gradient(135deg, #1DA1F2 0%, #0D8BD9 100%);
            }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <a href="login.html" class="back-to-login" title="Kembali ke Login">←</a>

    <div class="title-section">
        <h1>⚫️⚪️ Profil Siswa</h1>
        <p>Yin Yang Harmony</p>
    </div>

    <div class="container">
        <!-- CARD 1 - KAMU -->
        <div class="profile-card card-1">
            <img src="https://via.placeholder.com/400x160/2c2c2c/ffffff?text=KAMU" alt="Foto Kamu" class="profile-image">
            <div class="profile-header">
                <h2>Arsyad </h2>
                <p class="kelas">TE 2C</p>
            </div>
            <ul class="info-list">
                <li class="info-item">
                    <div class="info-icon">📛</div>
                    <div class="info-text">
                        <h3>Nama Lengkap</h3>
                        <p>Muchammad Arsyad Badruz Zaman</p>
                    </div>
                </li>
                <li class="info-item">
                    <div class="info-icon">📱</div>
                    <div class="info-text">
                        <h3>No. HP</h3>
                        <p>+62 813 9049 9030</p>
                    </div>
                </li>
                <li class="info-item">
                    <div class="info-icon">🏫</div>
                    <div class="info-text">
                        <h3>Asal Sekolah</h3>
                        <p>SMAN 1 Cawas</p>
                    </div>
                </li>
                <li class="info-item">
                    <div class="info-icon">🎓</div>
                    <div class="info-text">
                        <h3>Jurusan</h3>
                        <p>Ilmu Pengetahuan Alam</p>
                    </div>
                </li>
                <li class="info-item">
                    <div class="info-icon">🆔</div>
                    <div class="info-text">
                        <h3>NIM</h3>
                        <p>4.31.24.2.14</p>
                    </div>
                </li>
            </ul>
            </ul>
            <div class="social-section">
                <div class="social-title">Hubungi</div>
                <div class="social-buttons">
                    <a href="https://wa.me/6281328296017" class="social-btn social-whatsapp" target="_blank" title="WhatsApp" rel="noopener">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://instagram.com/irfan_rifai" class="social-btn social-instagram" target="_blank" title="Instagram" rel="noopener">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://tiktok.com/@irfan_rifai" class="social-btn social-tiktok" target="_blank" title="TikTok" rel="noopener">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://twitter.com/irfan_rifai" class="social-btn social-twitter" target="_blank" title="Twitter" rel="noopener">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="profile-card card-2">
            <img src="https://via.placeholder.com/120/2c2c2c/ffffff?text=TEMAN" alt="Foto Teman" class="profile-image">
            <div class="profile-header">
                <h2>Irfan</h2>
                <p class="kelas">TE 2C</p>
            </div>
            <ul class="info-list">
                <li class="info-item">
                    <div class="info-icon">📛</div>
                    <div class="info-text">
                        <h3>Nama Lengkap</h3>
                        <p>Muhammad Irfan Rifai</p>
                    </div>
                </li>
                <li class="info-item">
                    <div class="info-icon">📱</div>
                    <div class="info-text">
                        <h3>No. HP</h3>
                        <p>+62 813-2829-6017</p>
                    </div>
                </li>
                <li class="info-item">
                    <div class="info-icon">🏫</div>
                    <div class="info-text">
                        <h3>Asal Sekolah</h3>
                        <p>SMKN 5 Semarang</p>
                    </div>
                </li>
                <li class="info-item">
                    <div class="info-icon">🎓</div>
                    <div class="info-text">
                        <h3>Jurusan</h3>
                        <p>Teknik Komputer Jaringan</p>
                    </div>
                </li>
                <li class="info-item">
                    <div class="info-icon">🆔</div>
                    <div class="info-text">
                        <h3>NIM</h3>
                        <p>4.31.24.2.15</p>
                    </div>
                </li>
            </ul>
            </ul>
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
</body>
</html>