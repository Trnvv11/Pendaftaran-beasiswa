<?php

// import koneksi database dari file konfig
include('config.php');

// untuk memulai eksekusi session  server
session_start();

// get untuk mendapatkan data id
$id = $_GET['id'];

// untuk mendapatan data mahasiswa berdasarkan id
$selectQuery = "SELECT * FROM mahasiswa WHERE id='$id'";
// koneksi ke database untuk mendapatkan berdasarkan selectquery
$getUser = mysqli_query($conn, $selectQuery);
$rowUser = mysqli_fetch_assoc($getUser);
// pengecekan untuk mengetahui status verifikasi dan mengupdate sesuai dengan id
if($rowUser['status'] == 'Verifikasi') {
    $query = "UPDATE mahasiswa SET status='Belum di Verifikasi' WHERE id='$id'";
} else {
    $query = "UPDATE mahasiswa SET status='Verifikasi' WHERE id='$id'";
}

$sql = mysqli_query($conn, $query);

if($sql) {
    $_SESSION['result'] = 'Berhasil Mengubah Status';
    header('location:status_pendaftaran.php');
}

?>