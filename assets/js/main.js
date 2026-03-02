/* ================================================
   GRAND INDONESIA - Master JavaScript
   Semua JS ada di satu file ini
   ================================================ */

document.addEventListener('DOMContentLoaded', function() {

    // ========================================
    // 1. LOGIN PAGE - Reveal Animation
    // ========================================
    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.1 });
        reveals.forEach(el => observer.observe(el));
    }


    // ========================================
    // 2. ADMIN DROPDOWN (pojok kanan atas)
    // ========================================
    const adminDropdown = document.querySelector('.admin-dropdown');
    if (adminDropdown) {
        adminDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('open');
        });
        document.addEventListener('click', function() {
            adminDropdown.classList.remove('open');
        });
    }


    // ========================================
    // 3. SEARCH FILTER (semua halaman tabel)
    // ========================================
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const q = this.value.toLowerCase();
            document.querySelectorAll('tbody tr').forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }


    // ========================================
    // 4. CONFIRM HAPUS (semua halaman tabel)
    // ========================================
    document.addEventListener('click', function(e) {
        if (e.target.closest('.btn-delete')) {
            if (!confirm('Yakin ingin menghapus data ini?')) {
                e.preventDefault();
                e.stopPropagation();
                return;
            }
            // Logika hapus baris tabel ini mungkin nanti diganti jika sudah pakai database
            const row = e.target.closest('tr');
            if (row) row.remove();
        }
    });


    // ========================================
    // 5. MODAL - tombol Batal / close
    // ========================================
    document.querySelectorAll('.btn-cancel, .btn-close-modal').forEach(btn => {
        btn.addEventListener('click', function() {
            const toggle = document.getElementById('modal-toggle');
            if (toggle) toggle.checked = false;
        });
    });


    // ========================================
    // 6. TRANSAKSI - Hitung Otomatis
    // ========================================
    const noKamar = document.getElementById('no_kamar');
    const jmlHari = document.getElementById('jml_hari');
    const inputDp = document.getElementById('input_dp');
    const inputBayar = document.getElementById('input_bayar');

    if (noKamar && jmlHari) {
        function fmt(n) { return n.toLocaleString('id-ID'); }

        function hitungOtomatis() {
            const harga = parseInt(noKamar.value) || 0;
            const malam = parseInt(jmlHari.value) || 0;
            const dp = parseInt(inputDp ? inputDp.value : 0) || 0;
            const bayar = parseInt(inputBayar ? inputBayar.value : 0) || 0;
            const total = harga * malam;
            const sisa = Math.max(total - dp, 0);
            const kembali = Math.max(bayar - sisa, 0);

            const el = (id) => document.getElementById(id);
            if (el('display_total')) el('display_total').innerText = fmt(total);
            if (el('display_grand_total')) el('display_grand_total').innerText = fmt(total);
            if (el('display_sisa')) el('display_sisa').innerText = fmt(sisa);
            if (el('display_kembali')) el('display_kembali').innerText = fmt(kembali);
        }

        [noKamar, jmlHari, inputDp, inputBayar].forEach(el => {
            if (el) el.addEventListener('input', hitungOtomatis);
        });
    }


    // ========================================
    // 7. LAPORAN - Edit Modal via JS
    // ========================================
    window.openEditLaporan = function(id, nama, total, status) {
        const toggle = document.getElementById('modal-toggle');
        if (!toggle) return;
        document.getElementById('edit_id').innerText = id;
        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_total').value = 'Rp ' + total;
        const sel = document.getElementById('edit_status');
        if (sel) sel.value = status;
        toggle.checked = true;
    };

    window.saveLaporan = function() {
        const id = document.getElementById('edit_id').innerText;
        const status = document.getElementById('edit_status').value;
        alert('✅ Perubahan untuk ' + id + ' berhasil disimpan!\nStatus: ' + status);
        const toggle = document.getElementById('modal-toggle');
        if (toggle) toggle.checked = false;
    };


    // ========================================
    // 8. TAMU - Edit & Add Modal via JS
    // ========================================

    // FUNGSI BARU: Edit Tamu (Terhubung ke Database)
    window.openEditTamu = function(id, nama, email, telp, checkin, checkout) {
        // Kita pakai 'if' agar tidak error jika elemen belum dirender
        if (document.getElementById('edit_id')) document.getElementById('edit_id').value = id;
        if (document.getElementById('edit_nama')) document.getElementById('edit_nama').value = nama;
        if (document.getElementById('edit_email')) document.getElementById('edit_email').value = email;
        if (document.getElementById('edit_telp')) document.getElementById('edit_telp').value = telp;
        if (document.getElementById('edit_checkin')) document.getElementById('edit_checkin').value = checkin;
        if (document.getElementById('edit_checkout')) document.getElementById('edit_checkout').value = checkout;

        // Membuka modal dengan style display (versi terbaru)
        const modalEdit = document.getElementById('modalEditTamu');
        if (modalEdit) {
            modalEdit.style.display = 'flex';
        }
    };

    // FUNGSI BARU: Tutup Modal Edit Tamu
    window.closeEditModal = function() {
        const modalEdit = document.getElementById('modalEditTamu');
        if (modalEdit) {
            modalEdit.style.display = 'none';
        }
    };

    // FUNGSI BARU: Tambah Tamu
    window.openAddTamu = function() {
        const modalAdd = document.getElementById('modalAddTamu');
        if (modalAdd) {
            modalAdd.style.display = 'flex';
        }
    };

    // FUNGSI BARU: Tutup Modal Tambah Tamu
    window.closeAddModal = function() {
        const modalAdd = document.getElementById('modalAddTamu');
        if (modalAdd) {
            modalAdd.style.display = 'none';
        }
    };


    // ========================================
    // 9. PENGATURAN - Live Preview
    // ========================================
    window.updatePreview = function() {
        const get = (id) => { const el = document.getElementById(id); return el ? el.value : ''; };
        const set = (id, val) => { const el = document.getElementById(id); if (el) el.innerText = val; };
        set('pv_nama', get('in_nama'));
        set('pv_owner', get('in_owner'));
        set('pv_kontak', get('in_kontak'));
        set('pv_alamat', get('in_alamat'));
    };


    // ========================================
    // 10. PROSES TRANSAKSI
    // ========================================
    window.processTransaction = function() {
        const kamar = document.getElementById('no_kamar');
        if (!kamar || !parseInt(kamar.value)) {
            alert('⚠️ Silakan pilih nomor kamar terlebih dahulu!');
            return;
        }
        alert('✅ Transaksi berhasil disimpan!');
    };

});