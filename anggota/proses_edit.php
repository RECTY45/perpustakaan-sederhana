<?php
// Sertakan file koneksi database
include('../config/koneksi.php');

if(isset($_POST['submit'])) {
    // Tangkap data yang dikirimkan melalui form
    $id = $_POST['id'];
    $namaAnggota = $_POST['nama'];
    $alamatAnggota = $_POST['alamat'];
    $telpAnggota = $_POST['no_telp'];
    $emailAnggota = $_POST['email'];
    $jenisKelamin = $_POST['jenis_kelamin'];

    // Query untuk melakukan update data anggota berdasarkan id
    $sql = "UPDATE anggota SET 
                nama = '$namaAnggota', 
                alamat = '$alamatAnggota', 
                no_telp = '$telpAnggota', 
                email = '$emailAnggota', 
                jenis_kelamin = '$jenisKelamin'
            WHERE id_anggota = '$id'"; // Gunakan id dari data yang diambil sebelumnya

    // Lakukan query update
    if(mysqli_query($koneksi, $sql)) {
        echo "<script>
            alert('Data berhasil diupdate');
            window.location.href='../anggota';
        </script>";
    } else {
        // Jika query gagal, tampilkan pesan kesalahan MySQL
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika tidak ada pengiriman data melalui form, kembalikan ke halaman edit.php
    header('Location: ../anggota/edit.php');
    exit;
}
?>
