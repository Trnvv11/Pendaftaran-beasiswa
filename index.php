<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <!-- container navba start -->
    <div class="container pt-2">
        <!-- navbar start -->
        <nav class="nav nav-pills nav-fill rounded shadow fw-semibold">
            <a class="nav-link active bg-info text-white" aria-current="page" href="index.php">Pilihan Beasiswa</a>
            <a class="nav-link text-dark" href="pendaftaran.php">Daftar</a>
            <a class="nav-link text-dark" href="hasil.php">Hasil</a>
            <a class="nav-link text-dark" href="status_pendaftaran.php">Status Pendaftaran</a>
            <a class="nav-link text-dark" href="grafik.php">Grafik Pendaftaran</a>
        </nav>
        <!-- navbar end -->
    </div>
    <!-- container navbar end -->

    <!-- container card pilihan beasiswa start -->
    <div class="container mt-5 d-flex justify-content-center gap-5">
                <!-- card pilihan 1 -->
                <div class="card shadow" style="width: 25rem;">
                    <img src="assets/image/gambar1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Beasiswa Akademik</h5>
                        <p class="card-text">Beasiswa akademik merupakan beasiswa yang diberikan oleh institusi setiap tahun kepada mahasiswa aktif dan berprestasi dalam bidang akademik.</p>
                        <p style="font-size:13px"><span class="text-danger ">*)</span> IPK harus diatas 3.0</p>
                        <a href="pendaftaran.php" class="btn btn-info w-100 text-white fw-semibold">Daftar</a>
                    </div>
                </div>
                
                <!-- card pilihan 2 -->
                <div class="card shadow" style="width: 25rem;">
                    <img src="assets/image/gambar2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Beasiswa non Akademik</h5>
                        <p class="card-text">Beasiswa non akademik merupakan beasiswa yang diberikan oleh institusi setiap tahun kepada mahasiswa aktif dan berprestasi dalam bidang olahraga dan seni. </p>
                        <p style="font-size:13px"><span class="text-danger">*)</span> IPK harus diatas 3.0</p>
                        <a href="pendaftaran.php" class="btn btn-info text-white fw-semibold w-100">Daftar</a>
                    </div>
                </div>
    </div>
    <!-- container card pilihan beasiswa end -->

    </body>
    
    </html>