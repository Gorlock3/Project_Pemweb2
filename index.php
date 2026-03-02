<?php
/**
 * index.php — Halaman Login
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Indonesia | Management System</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body class="page-login">

    <!-- ===== HERO ===== -->
    <section class="hero">
        <div class="hero-content">
            <span class="badge-pill">Professional Hospitality Suite</span>
            <h1>Grand Indonesia<br><span class="accent-text">Management System</span></h1>
            <p class="hero-desc">
                Optimalkan operasional hotel Anda dengan platform manajemen terintegrasi. Dirancang untuk
                memberikan efisiensi maksimal dalam pengelolaan kamar, data tamu, hingga laporan keuangan.
            </p>
            <a href="#login-section" class="btn-hero">Mulai Kelola Sekarang</a>
        </div>
    </section>

    <!-- ===== FITUR ===== -->
    <section class="features">
        <div class="container">
            <div class="feature-grid">
                <div class="feature-item reveal">
                    <div class="f-icon"><i class="fas fa-layer-group"></i></div>
                    <div>
                        <h3>Manajemen Terpadu</h3>
                        <p>Kendali penuh atas seluruh aset kamar dalam satu layar. Update status ketersediaan secara instan untuk koordinasi tim yang lebih solid.</p>
                    </div>
                </div>
                <div class="feature-item reveal">
                    <div class="f-icon"><i class="fas fa-chart-area"></i></div>
                    <div>
                        <h3>Analisis Real-Time</h3>
                        <p>Pantau performa hotel Anda setiap saat. Data okupansi dan pendapatan disajikan dengan grafik yang presisi untuk pengambilan keputusan cepat.</p>
                    </div>
                </div>
                <div class="feature-item reveal">
                    <div class="f-icon"><i class="fas fa-shield-heart"></i></div>
                    <div>
                        <h3>Keamanan Data Tamu</h3>
                        <p>Perlindungan data tamu menjadi prioritas utama. Sistem menggunakan protokol enkripsi terbaru untuk menjamin kerahasiaan informasi sensitif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== LOGIN ===== -->
    <section id="login-section" class="login-section">
        <div class="login-card reveal">
            <i class="fas fa-hotel card-icon"></i>
            <h2>Akses Admin</h2>
            <p class="subtitle">Gunakan akun resmi manajemen untuk masuk</p>

            <form action="dashboard.php" method="get">
                <div class="form-group">
                    <label><i class="fas fa-user" style="margin-right:5px; color:#07276d;"></i>Username</label>
                    <input type="text" name="username" placeholder="Masukkan username" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-lock" style="margin-right:5px; color:#07276d;"></i>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk ke Dashboard
                </button>
            </form>
        </div>
    </section>

    <script src="assets/js/main.js"></script>
</body>
</html>
