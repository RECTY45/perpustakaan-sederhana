<?php
include "../config/koneksi.php";
global $koneksi;
$sql = "SELECT * FROM peminjaman ORDER BY id_peminjaman DESC";
$result = mysqli_query($koneksi, $sql);
$items = [];
if ($result) {
   while ($row = mysqli_fetch_assoc($result)) {
      $items[] = $row;
   }
   // Hitung jumlah data yang diperoleh
   $Peminajaman = mysqli_num_rows($result);
}
