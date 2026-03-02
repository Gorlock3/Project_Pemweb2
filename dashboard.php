<?php
$page_title = 'Dashboard';
include 'includes/head.php';
?>

<input type="checkbox" id="modal-toggle">
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">

    <!-- HEADER -->
    <div class="header-section">
        <?php include 'includes/navbar.php'; ?>
        <div class="page-title-row">
            <h1>Overview Dashboard</h1>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:#6c5ce7;"><i class="fas fa-users"></i></div>
            <div class="stat-info"><h4>Total Tamu</h4><p>1,284</p></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#3d5afe;"><i class="fas fa-door-closed"></i></div>
            <div class="stat-info"><h4>Total Kamar</h4><p>50</p></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#2196f3;"><i class="fas fa-bed"></i></div>
            <div class="stat-info"><h4>Kamar Terisi</h4><p>38</p></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#4caf50;"><i class="fas fa-check-circle"></i></div>
            <div class="stat-info"><h4>Kamar Tersedia</h4><p>12</p></div>
        </div>
    </div>

    <!-- WELCOME BOX -->
    <div class="welcome-box">
        <h3>Selamat Datang di Panel Manajemen Grand Indonesia</h3>
        <p>Gunakan menu di sebelah kiri untuk mengelola data operasional hotel. Statistik okupansi dapat dipantau secara real-time melalui kotak informasi di atas. Untuk proses booking dan pembayaran, gunakan menu <strong>Transaksi</strong>.</p>
    </div>

    <!-- QUICK LINKS -->
    <div class="quick-links">
        <a href="tamu.php" class="quick-link-card" style="border-left:4px solid #6c5ce7;">
            <i class="fas fa-user-friends" style="font-size:24px; color:#6c5ce7;"></i>
            <div><strong>Manajemen Tamu</strong><small>Kelola data tamu hotel</small></div>
        </a>
        <a href="kamar.php" class="quick-link-card" style="border-left:4px solid #3d5afe;">
            <i class="fas fa-bed" style="font-size:24px; color:#3d5afe;"></i>
            <div><strong>Manajemen Kamar</strong><small>Status & ketersediaan kamar</small></div>
        </a>
        <a href="transaksi.php" class="quick-link-card" style="border-left:4px solid #4caf50;">
            <i class="fas fa-cash-register" style="font-size:24px; color:#4caf50;"></i>
            <div><strong>Input Transaksi</strong><small>Booking & pembayaran</small></div>
        </a>
    </div>

</div>

<?php include 'includes/footer.php'; ?>
