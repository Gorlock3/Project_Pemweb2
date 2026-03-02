<?php
$page_title = 'Manajemen Kamar';
include 'includes/head.php';
?>

<input type="checkbox" id="modal-toggle">
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">

    <!-- HEADER -->
    <div class="header-section">
        <?php include 'includes/navbar.php'; ?>
        <div class="page-title-row">
            <h1>Manajemen Kamar</h1>
            <label for="modal-toggle" class="btn-tambah">
                <i class="fas fa-plus"></i> Tambah Kamar
            </label>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:#3d5afe;"><i class="fas fa-door-open"></i></div>
            <div class="stat-info"><h4>Total Kamar</h4><p>20</p></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#4caf50;"><i class="fas fa-check-circle"></i></div>
            <div class="stat-info"><h4>Kamar Tersedia</h4><p>12</p></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#2196f3;"><i class="fas fa-bed"></i></div>
            <div class="stat-info"><h4>Kamar Terisi</h4><p>6</p></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#f44336;"><i class="fas fa-tools"></i></div>
            <div class="stat-info"><h4>Maintenance</h4><p>2</p></div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-container">
        <div class="table-header">
            <input type="text" class="search-input" placeholder="🔍 Cari nomor atau tipe kamar...">
            <div class="filter-group">
                <select>
                    <option>All Status</option>
                    <option>Tersedia</option>
                    <option>Terisi</option>
                    <option>Maintenance</option>
                </select>
                <select>
                    <option>All Tipe</option>
                    <option>Deluxe</option>
                    <option>Superior</option>
                    <option>Suite</option>
                </select>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No Kamar</th>
                    <th>Tipe</th>
                    <th>Harga / Malam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $kamar_data = [
                    ['100', 'Superior',    'Rp 350.000',   'Tersedia',   'bg-success'],
                    ['101', 'Deluxe',      'Rp 500.000',   'Terisi',     'bg-info'],
                    ['102', 'Suite',       'Rp 750.000',   'Tersedia',   'bg-success'],
                    ['103', 'Deluxe',      'Rp 500.000',   'Maintenance','bg-warning'],
                    ['104', 'Superior',    'Rp 350.000',   'Terisi',     'bg-info'],
                    ['105', 'Deluxe VIP',  'Rp 1.200.000', 'Tersedia',   'bg-success'],
                ];
                foreach ($kamar_data as $k): ?>
                <tr>
                    <td><strong><?= $k[0] ?></strong></td>
                    <td><?= $k[1] ?></td>
                    <td><?= $k[2] ?></td>
                    <td><span class="badge <?= $k[4] ?>"><?= $k[3] ?></span></td>
                    <td>
                        <div class="action-cell">
                            <label for="modal-toggle" class="btn-action btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </label>
                            <button class="btn-action btn-delete">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- MODAL TAMBAH/EDIT KAMAR -->
<div class="modal-overlay">
    <div class="modal-content">
        <h3>Form Data Kamar</h3>
        <div class="form-group">
            <label class="required">Nomor Kamar</label>
            <input type="text" placeholder="Contoh: 201">
        </div>
        <div class="form-group">
            <label class="required">Tipe Kamar</label>
            <select>
                <option value="">Pilih Tipe</option>
                <option>Superior</option>
                <option>Deluxe</option>
                <option>Suite</option>
                <option>Deluxe VIP</option>
            </select>
        </div>
        <div class="form-group">
            <label class="required">Harga per Malam (Rp)</label>
            <input type="number" placeholder="Contoh: 500000">
        </div>
        <div class="form-group">
            <label class="required">Status Kamar</label>
            <select>
                <option value="">Pilih Status</option>
                <option>Tersedia</option>
                <option>Terisi</option>
                <option>Maintenance</option>
            </select>
        </div>
        <div class="modal-actions">
            <button class="btn-cancel">Batal</button>
            <button class="btn-save">Simpan Data</button>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
