<?php
include 'config/config.php'; // Sesuaikan pathnya jika perlu

// Menghitung total tamu dari database
$query_tamu = mysqli_query($conn, "SELECT COUNT(id) as total FROM tamu");
$data_tamu = mysqli_fetch_assoc($query_tamu);


$page_title = 'Manajemen Tamu';
include 'includes/head.php'; 
include 'config/config.php'; 
?>

<input type="checkbox" id="modal-toggle">
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">

    <div class="header-section">
        <?php include 'includes/navbar.php'; ?>
        <div class="page-title-row">
            <h1>Manajemen Tamu</h1>
            <button class="btn-tambah" onclick="openAddTamu()">
                <i class="fas fa-plus"></i> Tambah Tamu
            </button>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:#3d5afe;"><i class="fas fa-users"></i></div>
            <div class="stat-info"><h4>Total Tamu</h4><p><?= 1284; ?></p></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#6c5ce7;"><i class="fas fa-bed"></i></div>
            <div class="stat-info"><h4>Sedang Menginap</h4><p>42</p></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#4caf50;"><i class="fas fa-check-double"></i></div>
            <div class="stat-info"><h4>Checkout Selesai</h4><p>1,230</p></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#fbc02d;"><i class="fas fa-door-open"></i></div>
            <div class="stat-info"><h4>Kamar Tersedia</h4><p>12</p></div>
        </div>
    </div>

    <div class="table-container">
        <div class="table-header">
            <input type="text" class="search-input" placeholder="🔍 Cari nama tamu...">
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil data 
                $query = mysqli_query($conn, "SELECT * FROM tamu ORDER BY id ASC");
                $no = 1;

                // Looping data
                while ($row = mysqli_fetch_assoc($query)) {
                    // Format tanggal 
                    $tgl_checkin = date('d M Y', strtotime($row['tanggal_checkin']));
                    $tgl_checkout = date('d M Y', strtotime($row['tanggal_checkout']));
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><strong><?= htmlspecialchars($row['nama_lengkap']); ?></strong></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['no_telepon']); ?></td>
                    <td><?= $tgl_checkin; ?></td>
                    <td><?= $tgl_checkout; ?></td>
                    <td>
                        <div class="action-cell">
                          <button class="btn-action btn-edit" 
                            onclick="openEditTamu('<?= $row['id'] ?>', '<?= addslashes($row['nama_lengkap']) ?>', '<?= addslashes($row['email']) ?>', '<?= addslashes($row['no_telepon']) ?>', '<?= $row['tanggal_checkin'] ?>', '<?= $row['tanggal_checkout'] ?>')">
                            <i class="fas fa-edit"></i> Edit
                            </button>
                          <a href="tamu_edit/proses_hapus.php?id=<?= $row['id']; ?>" class="btn-action btn-delete" style="text-decoration: none; display: inline-block;">
                            <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                <?php 
                } 
                
                // Jika data kosong
                if(mysqli_num_rows($query) == 0){
                    echo "<tr><td colspan='7' style='text-align:center;'>Data tamu belum ada.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="pagination">
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
        </div>
    </div>

</div> <div class="modal-overlay" id="modalEditTamu" style="display: none;">
    <div class="modal-content">
        <form action="tamu_edit/proses_edit.php" method="POST">
            <h3 id="modal-title">Edit Data Tamu</h3>
            
            <input type="hidden" name="id" id="edit_id">

            <div class="form-group">
                <label class="required">Nama Lengkap</label>
                <input type="text" name="nama" id="edit_nama" required>
            </div>
            <div class="form-group">
                <label class="required">Email</label>
                <input type="email" name="email" id="edit_email" required>
            </div>
            <div class="form-group">
                <label class="required">No. Telepon</label>
                <input type="text" name="telp" id="edit_telp" required>
            </div>
            <div class="form-group">
                <label>Tanggal Check In</label>
                <input type="date" name="checkin" id="edit_checkin" required>
            </div>
            <div class="form-group">
                <label>Tanggal Check Out</label>
                <input type="date" name="checkout" id="edit_checkout" required>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeEditModal()">Batal</button>
                <button type="submit" class="btn-save">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
<div class="modal-overlay" id="modalAddTamu" style="display: none;">
    <div class="modal-content">
        <form action="tamu_edit/proses_tambah.php" method="POST">
            <h3>Tambah Tamu Baru</h3>
            
            <div class="form-group">
                <label class="required">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Nama sesuai KTP" required>
            </div>
            <div class="form-group">
                <label class="required">Email</label>
                <input type="email" name="email" placeholder="nama@email.com" required>
            </div>
            <div class="form-group">
                <label class="required">No. Telepon</label>
                <input type="text" name="telp" placeholder="08xxx" required>
            </div>
            <div class="form-group">
                <label>Tanggal Check In</label>
                <input type="date" name="checkin" required>
            </div>
            <div class="form-group">
                <label>Tanggal Check Out</label>
                <input type="date" name="checkout" required>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeAddModal()">Batal</button>
                <button type="submit" class="btn-save">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditTamu(id, nama, email, telp, checkin, checkout) {
    // Memasukkan data ke dalam form modal
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_nama').value = nama;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_telp').value = telp;
    document.getElementById('edit_checkin').value = checkin;
    document.getElementById('edit_checkout').value = checkout;
    
    // Tampilkan modal
    document.getElementById('modalEditTamu').style.display = 'flex';
}

function closeEditModal() {
    // Sembunyikan modal
    document.getElementById('modalEditTamu').style.display = 'none';
}
</script>

<?php include 'includes/footer.php'; ?>
