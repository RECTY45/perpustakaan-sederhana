<?php
include "../config/koneksi.php";
global $koneksi;
$sql = "SELECT * FROM buku ORDER BY id_buku DESC";
$result = mysqli_query($koneksi, $sql);
$items = [];
if ($result) {
   while ($row = mysqli_fetch_assoc($result)) {
      $items[] = $row;
   }
   // Hitung jumlah data yang diperoleh
   $Buku = mysqli_num_rows($result);
}
