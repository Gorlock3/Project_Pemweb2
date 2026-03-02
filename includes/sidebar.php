<?php
/**
 * includes/sidebar.php
 * Sidebar yang sama persis di semua halaman admin.
 * Variabel $current_page diambil otomatis dari nama file.
 */
$current_page = basename($_SERVER['PHP_SELF'], '.php');

$menu = [
    ['file' => 'dashboard',  'icon' => 'fas fa-th-large',      'label' => 'Dashboard'],
    ['file' => 'tamu',       'icon' => 'fas fa-user-friends',   'label' => 'Tamu'],
    ['file' => 'kamar',      'icon' => 'fas fa-bed',            'label' => 'Kamar'],
    ['file' => 'transaksi',  'icon' => 'fas fa-cash-register',  'label' => 'Transaksi'],
    ['file' => 'laporan',    'icon' => 'fas fa-chart-line',     'label' => 'Laporan'],
];
$settings = [
    ['file' => 'pengaturan', 'icon' => 'fas fa-cog',            'label' => 'Pengaturan'],
];
?>
<div class="sidebar">
    <div class="sidebar-brand">
        <i class="fas fa-hotel"></i>
        <span>Grand<br>Indonesia</span>
    </div>

    <div class="menu-label">Main Menu</div>
    <?php foreach ($menu as $item): ?>
        <a href="<?= $item['file'] ?>.php"
           class="nav-link <?= $current_page === $item['file'] ? 'active' : '' ?>">
            <i class="<?= $item['icon'] ?>"></i>
            <?= $item['label'] ?>
        </a>
    <?php endforeach; ?>

    <div class="menu-label">Pengaturan</div>
    <?php foreach ($settings as $item): ?>
        <a href="<?= $item['file'] ?>.php"
           class="nav-link <?= $current_page === $item['file'] ? 'active' : '' ?>">
            <i class="<?= $item['icon'] ?>"></i>
            <?= $item['label'] ?>
        </a>
    <?php endforeach; ?>

    <div class="logout-area">
        <a href="index.php" class="nav-link">
            <i class="fas fa-power-off"></i> Logout
        </a>
    </div>
</div>
