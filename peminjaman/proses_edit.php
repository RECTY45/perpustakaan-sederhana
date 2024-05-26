<?php
require '../config/koneksi.php';
global $koneksi;

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_wajib_dikembalikan = $_POST['tanggal_wajib_dikembalikan'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status_peminjaman = $_POST['status_peminjaman'];
    $pinjam_berapa_hari = $_POST['pinjam_berapa_hari'];
    $perpanjangan_peminjaman = $_POST['perpanjangan_peminjaman'];
    $status_denda = $_POST['status_denda'];
    $catatan_perpustakaan = $_POST['catatan_perpustakaan'];
    $id = $_POST['id'];
    var_dump($id);
    // Query untuk update data peminjaman
    $sql = "UPDATE peminjaman SET 
            id_anggota = '$id_anggota',
            id_buku = '$id_buku',
            tanggal_peminjaman = '$tanggal_peminjaman',
            tanggal_wajib_dikembalikan = '$tanggal_wajib_dikembalikan',
            tanggal_kembali = '$tanggal_kembali',
            status_peminjaman = '$status_peminjaman',
            pinjam_berapa_hari = '$pinjam_berapa_hari',
            perpanjangan_peminjaman = '$perpanjangan_peminjaman',
            status_denda = '$status_denda',
            catatan_perpustakaan = '$catatan_perpustakaan'
            WHERE id_peminjaman = '$id'"; // Anda perlu menambahkan variabel $id yang menyimpan ID peminjaman yang akan diupdate

    // Jalankan query
    $result = mysqli_query($koneksi, $sql);
    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Jika berhasil, redirect ke halaman dengan pesan sukses
        echo "<script>
               alert('Data berhasil Di Sunting');
               window.location.href='../peminjaman';
              </script>";
    } else {
        // Jika gagal, redirect ke halaman dengan pesan gagal
        "<script>
        alert('Data gagal Di Sunting');
        window.location.href='../peminjaman/edit.php';
      </script>";
    }
}else{
    echo "Akses Dilarang";
}
?>
