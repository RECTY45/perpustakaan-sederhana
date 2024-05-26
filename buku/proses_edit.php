<?php
require '../config/koneksi.php';
global $koneksi;

if(isset($_POST['submit'])){

    $idBuku = $_POST['id'];
    $judulBuku = $_POST['judul'];
    $penulisBuku = $_POST['penulis'];
    $tahunTerbit = $_POST['tahun_terbit'];
    $genreBuku = isset($_POST['genre']) ? implode(", ", $_POST['genre']) : "";
    $isbnBuku = $_POST['isbn'];
    $stokBuku = $_POST['stok'];

    $ekstensi_diperbolehkan = array('png', 'jpg');
    $namaFile = '';
    $ukuran = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];  
    $x = explode('.', $_FILES['gambar']['name']);
    $ekstensi = strtolower(end($x));

    $namaFile = '';

    // Lakukan pengecekan apakah gambar diubah atau tidak
    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $namaFile = $idBuku . '.' . $ekstensi;
    } else {
        // Jika tidak ada perubahan pada gambar, gunakan nama file gambar sebelumnya
        $namaFile = isset($_POST['gambar_lama']) ? $_POST['gambar_lama'] : ''; // Jika tidak ada gambar sebelumnya, berikan nilai default string kosong
    }

    // Jika ekstensi bukan PNG, ubah ke PNG
    if ($ekstensi != 'png') {
        $namaFile = $idBuku . '.png';
    }

    if(!move_uploaded_file($file_tmp, '../assets/images/cover/' .$namaFile)){
        echo 'GAGAL MENGUPLOAD GAMBAR';
        exit;
    }
    
    // buat query
    $sql = "UPDATE `buku` SET judul='$judulBuku', penulis='$penulisBuku', tahun_terbit='$tahunTerbit', genre='$genreBuku', gambar='$namaFile', isbn='$isbnBuku', stok='$stokBuku' WHERE id_buku='$idBuku'"; // Ubah 'id' menjadi 'id_buku' atau sesuaikan dengan nama kolom ID buku di tabel Anda
    $query = mysqli_query($koneksi, $sql);  

    // apakah query simpan berhasil?
    if($query) {
        // kalau berhasil alihkan ke halaman buku dengan status=sukses
        echo "<script>
               alert('Data berhasil diupdate');
               window.location.href='../buku/';
              </script>";
    } else {
        // tidak alihkan ke halaman lain dengan status=gagal
        echo "<script>
                alert('Data gagal diupdate');
                window.location.href='../buku/edit.php?id=$idBuku';
              </script>";
    }

} else {
    echo "Akses Dilarang..";
}
?>
