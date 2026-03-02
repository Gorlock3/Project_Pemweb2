<?php
$page_title = 'Laporan Transaksi';
include 'includes/head.php';
?>

<input type="checkbox" id="modal-toggle">
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">

    <!-- HEADER -->
    <div class="header-section">
        <?php include 'includes/navbar.php'; ?>
        <div class="page-title-row">
            <h1>Laporan Transaksi</h1>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-container" style="margin-top:-55px;">
        <div class="table-header">
            <div class="filter-group">
                <input type="date" value="<?= date('Y-m-01') ?>">
                <span style="color:#bbb; font-size:13px;">s/d</span>
                <input type="date" value="<?= date('Y-m-d') ?>">
            </div>
            <input type="text" class="search-input" placeholder="🔍 Cari ID atau Nama Tamu...">
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Tamu</th>
                    <th>Kamar</th>
                    <th>Jenis</th>
                    <th>Total Harga</th>
                    <th>DP</th>
                    <th>Sisa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $transaksi = [
                    ['#TRX-1001', 'Budi Santoso',  '101 (Deluxe)',      'Booking',  'Rp 1.000.000', 'Rp 200.000', 'Rp 800.000', 'DP Masuk', 'badge-dp',    '1.000.000', 'DP Masuk'],
                    ['#TRX-1002', 'Siti Aminah',   '100 (Superior)',    'Langsung', 'Rp 350.000',   'Rp 0',       'Rp 0',       'Lunas',    'badge-lunas', '350.000',   'Lunas'],
                    ['#TRX-1003', 'Rudi Hartono',  '102 (Suite)',       'Booking',  'Rp 1.500.000', 'Rp 500.000', 'Rp 1.000.000','DP Masuk','badge-dp',   '1.500.000', 'DP Masuk'],
                    ['#TRX-1004', 'Maya Putri',    '105 (Deluxe VIP)',  'Langsung', 'Rp 2.400.000', 'Rp 0',       'Rp 0',       'Lunas',    'badge-lunas', '2.400.000', 'Lunas'],
                ];
                foreach ($transaksi as $t):
                   $js = "openEditLaporan('{$t[0]}','{$t[1]}','{$t[9]}','{$t[10]}')";
                ?>
                <tr>
                    <td><code><?= $t[0] ?></code></td>
                    <td><strong><?= $t[1] ?></strong></td>
                    <td><?= $t[2] ?></td>
                    <td><?= $t[3] ?></td>
                    <td><?= $t[4] ?></td>
                    <td><?= $t[5] ?></td>
                    <td><?= $t[6] ?></td>
                    <td><span class="badge <?= $t[8] ?>"><?= $t[7] ?></span></td>
                    <td>
                        <!-- Pakai button + onclick JS, BUKAN label[for=modal-toggle] -->
                        <button class="btn-action btn-edit" onclick="<?= $js ?>">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <button class="active">1</button>
            <button>2</button>
        </div>
    </div>

</div>

<!-- MODAL EDIT TRANSAKSI -->
<div class="modal-overlay">
    <div class="modal-content">
        <h3>Edit Transaksi <span id="edit_id" style="color:var(--primary-blue);"></span></h3>
        <div class="form-group">
            <label>Nama Tamu</label>
            <input type="text" id="edit_nama" readonly>
        </div>
        <div class="form-group">
            <label>Total Harga</label>
            <input type="text" id="edit_total" readonly>
        </div>
        <div class="form-group">
            <label class="required">Update Status Pembayaran</label>
            <select id="edit_status">
                <option value="DP Masuk">DP Masuk</option>
                <option value="Lunas">Lunas</option>
                <option value="Dibatalkan">Dibatalkan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Catatan Tambahan</label>
            <input type="text" placeholder="Contoh: Tambah extra bed">
        </div>
        <div class="modal-actions">
            <button class="btn-cancel">Batal</button>
            <button class="btn-save" onclick="saveLaporan()">Simpan Perubahan</button>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
