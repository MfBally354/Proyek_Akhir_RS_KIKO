// --- script.js ---

// Fungsi untuk konfirmasi hapus data
function konfirmasiHapus(id) {
    var tanya = confirm("Apakah Anda yakin ingin menghapus data pasien ini?");
    if (tanya) {
        // Jika user klik OK, arahkan ke file penghapus PHP
        window.location.href = "pasien_hapus.php?id=" + id;
    }
    // Jika Cancel, tidak terjadi apa-apa
    return false;
}
