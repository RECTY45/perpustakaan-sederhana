<?php
require '../config/koneksi.php';
global $koneksi;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama file gambar dari database sebelum menghapus data
    $sql_select = "SELECT gambar FROM buku WHERE id_buku='$id'";
    $result = mysqli_query($koneksi, $sql_select);
    $row = mysqli_fetch_assoc($result);
    $namaFileGambar = $row['gambar'];

    $sql = "DELETE FROM buku WHERE id_buku='$id'";

    if (mysqli_query($koneksi, $sql)) {
        // Hapus file gambar hanya jika data berhasil dihapus dari database
        if ($namaFileGambar != '') {
            $path = '../assets/images/cover/' . $namaFileGambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        echo "<script>
              alert('Data berhasil dihapus');
              window.location.href = '../buku';
             </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
}
?>
