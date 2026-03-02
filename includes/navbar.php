<?php
/**
 * includes/navbar.php
 * Top bar yang sama di semua halaman admin.
 * Variabel $page_title harus di-set sebelum include.
 */
$page_title = isset($page_title) ? $page_title : 'Dashboard';
?>
<div class="top-bar">
    <span class="breadcrumb-text">
        <i class="fas fa-hotel" style="color:#a5b4fc; margin-right:5px;"></i>
        Grand Indonesia &bull; <?= htmlspecialchars($page_title) ?>
    </span>

    <!-- Admin Dropdown — dikontrol lewat JS (class .open) -->
    <div class="admin-dropdown">
        <i class="far fa-bell" style="color:#888; font-size:15px; margin-right:4px;"></i>
        <img src="https://ui-avatars.com/api/?name=Admin+Hotel&background=3d5afe&color=fff" alt="Admin">
        <span class="admin-name">Admin</span>
        <i class="fas fa-chevron-down chevron"></i>

        <div class="dropdown-menu">
            <a href="pengaturan.php"><i class="fas fa-cog" style="margin-right:7px;"></i>Pengaturan</a>
            <a href="index.php" class="logout"><i class="fas fa-power-off" style="margin-right:7px;"></i>Logout</a>
        </div>
    </div>
</div>
