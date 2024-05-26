<?php
require '../config/koneksi.php';
global $koneksi;

if(isset($_POST['submit'])){

    $namaAnggota = $_POST['nama'];
    $alamatAnggota = $_POST['alamat'];
    $telpAnggota = $_POST['no_telp'];
    $emailAnggota = $_POST['email'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    // buat query
    $sql = "INSERT INTO `anggota` (nama, alamat, no_telp, email, jenis_kelamin) VALUES ('$namaAnggota', '$alamatAnggota', '$telpAnggota', '$emailAnggota', '$jenisKelamin')";
    $query = mysqli_query($koneksi, $sql);  

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman anggota dengan status=sukses
        echo "<script>
               alert('Data berhasil di tambah');
               window.location.href='../anggota/';
              </script>";
    } else {
        // tidak alihkan ke halaman lain dengan status=gagal
        echo "<script>
                alert('Data gagal di tambah');
                window.location.href='../anggota/tambah.php';
              </script>";
    }

}else {
    echo "Akses Dilarang..";
}
?>
