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
    <!-- chartjs import -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- navbar start -->
    <div class="container pt-2">
        <nav class="nav nav-pills nav-fill rounded shadow fw-semibold">
            <a class="nav-link text-dark" aria-current="page" href="index.php">Pilihan Pendaftaran</a>
            <a class="nav-link text-dark" href="pendaftaran.php">Daftar</a>
            <a class="nav-link text-dark" href="hasil.php">Hasil</a>
            <a class="nav-link text-dark" href="status_pendaftaran.php">Status Pendaftaran</a>
            <a class="nav-link active bg-info" href="grafik.php">Grafik Pendaftaran</a>
        </nav>
    </div>
    <!-- navbar end -->

    <!-- container grafik start -->
    <div class="container justify-content-center">
        <div class="row">
            <div class="col">
                <!-- judul grafik -->
                <h4 class="text-center mt-4 mb-5">Grafik Pendaftaran Beasiswa</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- canvas untuk grafik verifikasi-->
                <canvas id="myTypeBeasiswa" style="height:70vh; width:70vh; margin:0 auto;"></canvas>
            </div>
            <!-- canvas untuk grafik verifikasi -->
            <div class="col">
                <canvas id="myVerifikasi" style="height:70vh; width:70vh; margin:0 auto;"></canvas>
            </div>
        </div>
    </div>
    <!-- container grafik start -->
    
    <!-- script start -->
    <script>
        // define variabel chart typebeasiswa dan setup dataset
        const data = {
            labels: [
                'Akademik',
                'Non Akademik',
            ],
            datasets: [{
                label: 'total',
                data: [
                    <?php 
                    // query untuk koneksi dan ambil data dari database
                    $qry = $conn->query("SELECT beasiswa FROM mahasiswa WHERE beasiswa='akademik'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>,
                    <?php 
                    // query untuk koneksi dan ambil data dari database
                        $qry = $conn->query("SELECT beasiswa FROM mahasiswa WHERE beasiswa='non'");
                        $resF = $qry->num_rows;
                        echo $resF;
                        ?>
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                ],
                hoverOffset: 4
            }]
        };   
        
        // variabel untuk konfigurasi chart
        const config = {
            type: 'polarArea',
            data: data,
        };
        
        // untuk mengambil id dari elemen html dengan id myVerifikasi
        const myChart = new Chart(
            document.getElementById('myTypeBeasiswa'),
            config
            );
            
            // define variabel chart verifikasi
        const verifikasi = {
            labels: [
                'Verifikasi',
                'Belum Verifikasi',
            ],
            datasets: [{
                label: 'total',
                data: [
                    <?php 
                    // query untuk koneksi dan ambil data dari database
                    $qry = $conn->query("SELECT status FROM mahasiswa WHERE status='Verifikasi'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>,
                    <?php 
                    // query untuk koneksi dan ambil data dari database
                    $qry = $conn->query("SELECT status FROM mahasiswa WHERE status='Belum di Verifikasi'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>
                ],
                // background untuk pie
                backgroundColor: [
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)'
                ],
                hoverOffset: 4
            }]
            };   
            
            // variabel untuk konfigurasi chart
            const confVerifikasi = {
                type: 'polarArea',
                data: verifikasi,
            };
            
            // untuk mengambil id dari elemen html dengan id myVerifikasi
            const myChart1 = new Chart(
                document.getElementById('myVerifikasi'),
                confVerifikasi
                )
                
    </script>
    <!-- script end -->

<!-- import bootstrap chartjs -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>