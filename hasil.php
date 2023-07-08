<?php

include('config.php');
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Beasiswa</title>
    <!-- bootstrap import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <!-- container navbar start -->
    <div class="container pt-2">
        <!-- navbar start -->
        <nav class="nav nav-pills nav-fill rounded shadow fw-semibold">
            <a class="nav-link text-dark" aria-current="page" href="index.php">Pilihan Pendaftaran</a>
            <a class="nav-link text-dark" href="pendaftaran.php">Daftar</a>
            <a class="nav-link active bg-info" href="hasil.php">Hasil</a>
            <a class="nav-link text-dark" href="status_pendaftaran.php">Status Pendaftaran</a>
            <a class="nav-link text-dark" href="grafik.php">Grafik Pendaftaran</a>
        </nav>
        <!-- end contaier navabar -->
    </div>

    <!-- containerr tabel hasil start -->
    <div class="container d-flex justify-content-center">
        <!-- card start -->
        <div class="card mt-5" style="width: 100%;">
            <h4 class="text-center mt-4">Hasil</h4>
            <div class="card-body">
                <!-- table start  -->
                <table class="table table-responsive table-bordered">
                    <tbody>
                        <?php
                            include('config.php');
                            // koneksi ke database dan ambil data dari tabel mahasiswa dan diurutkan secara descending
                            $query = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id DESC");
                            $user = mysqli_fetch_assoc($query);
                        ?>
                        <!-- memasukkan data dari tabel mahasiswa ke setiap kolom nama, email dst -->
                        <tr>
                            <td width="200px">Nama</td>
                            <td><?= $user['name'] ?></td>
                        </tr>
                        <tr>
                            <td width="200px">Email</td>
                            <td><?= $user['email'] ?></td>
                        </tr>
                        <tr>
                            <td width="200px">Nomor Handphone</td>
                            <td><?= $user['phone_number'] ?></td>
                        </tr>
                        <tr>
                            <td width="200px">Semester</td>
                            <td><?= $user['semester'] ?></td>
                        </tr>
                        <tr>
                            <td width="200px">IPK</td>
                            <td><?= $user['ipk'] ?></td>
                        </tr>
                        <tr>
                            <td width="200px">Beasiswa</td>
                            <td><?= $user['beasiswa'] ?></td>
                        </tr>
                        <tr class="border">
                            <td width="200px">Status</td>
                            
                            <?php
                            // pengecekan untuk mencetak status verfikasi
                            if ($user['status'] == "Verifikasi"){
                                echo '
                                <td class="badge text-bg-success mt-2">
                                Verifikasi
                                </td>';
                            }else {
                                echo '
                                <td class="badge text-bg-warning mt-2">
                                Belum di Verifikasi
                                </td>';
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
                <!-- end of table -->
            </div>
        </div>
        <!-- card end -->
    </div>
    <!-- end container hasil -->

    <!-- bootstrap js import -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>