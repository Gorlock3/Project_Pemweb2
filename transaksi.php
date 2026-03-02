<?php
$page_title = 'Transaksi';
include 'includes/head.php';
include 'includes/sidebar.php';
?>

<div class="main-content">

    <!-- HEADER -->
    <div class="header-section">
        <?php include 'includes/navbar.php'; ?>
        <div class="page-title-row">
            <h1>Input Transaksi</h1>
        </div>
    </div>

    <!-- FORM TRANSAKSI -->
    <div class="transaction-wrapper">
        <div class="transaction-card">

            <div class="section-label"><i class="fas fa-file-alt"></i> Data Pemesanan</div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="required">Jenis Transaksi</label>
                    <select id="jenis_trx">
                        <option value="Booking">Booking Hotel</option>
                        <option value="Langsung">Check-In Langsung</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="required">Nomor Kamar</label>
                    <select id="no_kamar">
                        <option value="0">Pilih Kamar</option>
                        <option value="350000">100 — Superior (Rp 350.000)</option>
                        <option value="500000">101 — Deluxe (Rp 500.000)</option>
                        <option value="750000">102 — Suite (Rp 750.000)</option>
                        <option value="1200000">105 — Deluxe VIP (Rp 1.200.000)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="required">Nama Tamu</label>
                    <input type="text" placeholder="Masukkan nama tamu">
                </div>
                <div class="form-group">
                    <label class="required">Jumlah Malam</label>
                    <input type="number" id="jml_hari" value="1" min="1">
                </div>
                <div class="form-group">
                    <label class="required">Check-In</label>
                    <input type="date" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="form-group">
                    <label class="required">Check-Out</label>
                    <input type="date" value="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                </div>
            </div>

            <div class="divider"></div>

            <div class="section-label"><i class="fas fa-calculator"></i> Perhitungan Pembayaran</div>

            <div class="calc-grid">
                <div class="calc-col">
                    <div class="calc-row">
                        <span>Total Harga</span>
                        <strong>Rp <span id="display_total">0</span></strong>
                    </div>
                    <div class="calc-row">
                        <span class="required">Uang Muka (DP)</span>
                        <div class="input-inline">
                            <span class="rp-label">Rp</span>
                            <input type="number" id="input_dp" value="0" min="0">
                        </div>
                    </div>
                    <div class="calc-row total-row">
                        <span>Grand Total</span>
                        <strong style="color:var(--primary-blue);">Rp <span id="display_grand_total">0</span></strong>
                    </div>
                </div>

                <div class="calc-divider"></div>

                <div class="calc-col">
                    <div class="calc-row">
                        <span>Sisa Pembayaran</span>
                        <strong style="color:#f44336;">Rp <span id="display_sisa">0</span></strong>
                    </div>
                    <div class="calc-row">
                        <span class="required">Uang Dibayar</span>
                        <div class="input-inline">
                            <span class="rp-label">Rp</span>
                            <input type="number" id="input_bayar" value="0" min="0">
                        </div>
                    </div>
                    <div class="calc-row total-row">
                        <span>Kembalian</span>
                        <strong style="color:#2e7d32;">Rp <span id="display_kembali">0</span></strong>
                    </div>
                </div>
            </div>

            <button class="btn-proses" onclick="processTransaction()">
                <i class="fas fa-check-circle"></i> Proses &amp; Simpan Transaksi
            </button>
        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>
