<?php
require '../config/koneksi.php';
global $koneksi;

if (isset($_POST['submit'])) {
    $namaAnggota = $_POST['nama_anggota'];
    $idBuku = $_POST['id_buku'];
    $tanggalPeminjaman = $_POST['tanggal_peminjaman'];
    $tanggalWajibDikembalikan = $_POST['tanggal_wajib_dikembalikan'];
    $pinjamBerapaHari = $_POST['pinjam_berapa_hari'];
    $statusPeminjaman = 'Dipinjam';
    $statusDenda = 'Tidak Denda';
    $catatanPerpustakaan = $_POST['catatan_perpustakaan'];;

    // Buat query untuk menambah data peminjaman
    $sql = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal_peminjaman, tanggal_wajib_dikembalikan, pinjam_berapa_hari, status_peminjaman, status_denda, catatan_perpustakaan) VALUES ('$namaAnggota', '$idBuku', '$tanggalPeminjaman', '$tanggalWajibDikembalikan', '$pinjamBerapaHari', '$statusPeminjaman', '$statusDenda', '$catatanPerpustakaan')";

    // Eksekusi query
    $query = mysqli_query($koneksi, $sql);

    // Apakah query simpan berhasil?
    if ($query) {
        // Kalau berhasil alihkan ke halaman peminjaman dengan status=sukses
        echo "<script>
               alert('Data berhasil ditambah');
               window.location.href='../peminjaman/';
              </script>";
    } else {
        // Tidak alihkan ke halaman lain dengan status=gagal
        echo "<script>
                alert('Data gagal ditambah');
                window.location.href='../peminjaman/tambah.php';
              </script>";
    }
} else {
    echo "Akses Dilarang..";
}
?>
