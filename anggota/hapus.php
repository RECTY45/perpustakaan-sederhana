<?php
require '../config/koneksi.php';
global $koneksi;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM anggota WHERE id_anggota='$id'";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
              alert('Data berhasil dihapus');
              window.location.href = '../anggota';
             </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
}
?>