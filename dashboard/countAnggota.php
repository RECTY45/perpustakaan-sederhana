<?php
include "../config/koneksi.php";
global $koneksi;
$sql = "SELECT * FROM anggota ORDER BY id_anggota DESC";
$result = mysqli_query($koneksi, $sql);
$items = [];
if ($result) {
   while ($row = mysqli_fetch_assoc($result)) {
      $items[] = $row;
   }
   // Hitung jumlah data yang diperoleh
   $totalData = mysqli_num_rows($result);
}
