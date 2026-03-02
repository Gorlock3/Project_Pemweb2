<?php
$page_title = 'Pengaturan';
include 'includes/head.php';
include 'includes/sidebar.php';
?>

<div class="main-content">

    <!-- HEADER -->
    <div class="header-section">
        <?php include 'includes/navbar.php'; ?>
        <div class="page-title-row">
            <h1>Pengaturan Sistem</h1>
        </div>
    </div>

    <!-- SETTINGS WRAPPER -->
    <div class="settings-wrapper">

        <!-- FORM -->
        <div class="settings-card">
            <h2><i class="fas fa-hotel" style="color:var(--primary-blue); margin-right:10px;"></i>Identitas Hotel</h2>
            <div class="form-grid-settings">
                <div class="form-group full-width">
                    <label><i class="fas fa-heading" style="margin-right:5px; color:var(--primary-blue);"></i>Nama Hotel</label>
                    <input type="text" id="in_nama" value="Grand Indonesia Hotel" oninput="updatePreview()">
                </div>
                <div class="form-group">
                    <label><i class="fas fa-user-tie" style="margin-right:5px; color:var(--primary-blue);"></i>Owner / Pemilik</label>
                    <input type="text" id="in_owner" value="Bpk. John Doe" oninput="updatePreview()">
                </div>
                <div class="form-group">
                    <label><i class="fas fa-phone" style="margin-right:5px; color:var(--primary-blue);"></i>Kontak / WhatsApp</label>
                    <input type="text" id="in_kontak" value="0812-3456-7890" oninput="updatePreview()">
                </div>
                <div class="form-group full-width">
                    <label><i class="fas fa-map-marker-alt" style="margin-right:5px; color:var(--primary-blue);"></i>Alamat Lengkap</label>
                    <textarea id="in_alamat" rows="3" oninput="updatePreview()">Jl. Sudirman No. 123, Jakarta Pusat, DKI Jakarta</textarea>
                </div>
            </div>
            <button class="btn-save-settings" onclick="alert('✅ Pengaturan berhasil diperbarui!')">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>

        <!-- PREVIEW -->
        <div class="preview-card">
            <h3><i class="fas fa-eye" style="margin-right:5px;"></i> Live Preview</h3>
            <div class="pv-name" id="pv_nama">Grand Indonesia Hotel</div>
            <div class="pv-addr" id="pv_alamat">Jl. Sudirman No. 123, Jakarta Pusat, DKI Jakarta</div>
            <div class="pv-row"><i class="fas fa-user"></i> <span id="pv_owner">Bpk. John Doe</span></div>
            <div class="pv-row"><i class="fab fa-whatsapp"></i> <span id="pv_kontak">0812-3456-7890</span></div>
            <div class="pv-note">Data ini akan tampil pada header laporan dan struk transaksi hotel.</div>
        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>
