<?php
require '../config/koneksi.php';
global $koneksi;

if(isset($_POST['submit'])){

    $judulBuku = $_POST['judul'];
    $penulisBuku = $_POST['penulis'];
    $tahunTerbit = $_POST['tahun_terbit'];
    $genreBuku = isset($_POST['genre']) ? implode(", ", $_POST['genre']) : "";
    $isbnBuku = $_POST['isbn'];
    $stokBuku = $_POST['stok'];

    $ekstensi_diperbolehkan = array('png', 'jpg');
    $namaFile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];  
    $x = explode('.', $namaFile);
    $ekstensi = strtolower(end($x));

    // Jika ekstensi bukan PNG, ubah menjadi PNG
    if(!in_array($ekstensi, $ekstensi_diperbolehkan)){
        $namaFile = $x[0] . '.png'; // Gunakan ekstensi PNG sebagai default
    }

    if($ukuran >= 1044070){
        echo 'UKURAN FILE TERLALU BESAR';
        exit;
    }

    // buat query
    $sql = "INSERT INTO `buku` (judul, penulis, tahun_terbit, genre, gambar, isbn, stok) VALUES ('$judulBuku', '$penulisBuku', '$tahunTerbit','$genreBuku', '$namaFile', '$isbnBuku', '$stokBuku')";
    $query = mysqli_query($koneksi, $sql);  

    // Ambil ID buku yang baru saja dimasukkan
    $idBuku = mysqli_insert_id($koneksi);

    // Generate nama file baru dengan ID buku
    $namaFileBaru = $idBuku . '.png'; // Gunakan ekstensi PNG sebagai default

    if(!move_uploaded_file($file_tmp, '../assets/images/cover/' .$namaFileBaru)){
        echo 'GAGAL MENGUPLOAD GAMBAR';
        exit;
    }

    // Update nama file gambar dalam database sesuai dengan ID buku
    $sqlUpdate = "UPDATE `buku` SET gambar='$namaFileBaru' WHERE id_buku='$idBuku'";
    $queryUpdate = mysqli_query($koneksi, $sqlUpdate);

    // apakah query simpan berhasil?
    if($query && $queryUpdate) {
        // kalau berhasil alihkan ke halaman buku dengan status=sukses
        echo "<script>
               alert('Data berhasil ditambah');
               window.location.href='../buku/';
              </script>";
    } else {
        // tidak alihkan ke halaman lain dengan status=gagal
        echo "<script>
                alert('Data gagal ditambah');
                window.location.href='../buku/tambah.php';
              </script>";
    }

} else {
    echo "Akses Dilarang..";
}
?>
