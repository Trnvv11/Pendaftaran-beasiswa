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
    <!-- bootstrap import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <!-- container navbar start -->
    <div class="container pt-2">
        <!-- navbar start -->
        <nav class="nav nav-pills nav-fill rounded shadow fw-semibold">
            <a class="nav-link text-dark" aria-current="page" href="index.php">Pilihan Pendaftaran</a>
            <a class="nav-link active bg-info" href="pendaftaran.php">Daftar</a>
            <a class="nav-link text-dark" href="hasil.php">Hasil</a>
            <a class="nav-link text-dark" href="status_pendaftaran.php">Status Pendaftaran</a>
            <a class="nav-link text-dark" href="grafik.php">Grafik Pendaftaran</a>
        </nav>
        <!-- navbar end -->
    </div>
    <!-- container navbar end -->

    <h5 class="text-center mt-5">DAFTAR BEASISWA</h5>

    <!-- container form start -->
    <div class="container">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card mt-3 px-3 mb-5" style="width: 50%;">
                <div class="border-bottom mt-3">
                    <!-- title form -->
                    <p>Registrasi Beasiswa</p>
                </div>
                <!-- alert  -->
                <?php
                if (isset($_SESSION['message'])) {
                    if ($_SESSION['message'][1] == 'sukses') {
                ?>
                <!-- allert sukses pendaftaran -->
                        <div class="alert alert-success mt-3" role="alert">
                            <?= $_SESSION['message'][0]; ?>
                            <?php unset($_SESSION['message']); ?>
                        </div>
                    <?php
                    } else {
                    ?>
                    <!-- alert peringatan -->
                        <div class="alert alert-danger mt-3" role="alert">
                            <?= $_SESSION['message'][0]; ?>
                            <?php unset($_SESSION['message']); ?>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="card-body">
                    <!-- form start dengan method post -->
                    <form action="proses_pendaftaran.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col mb-3 d-flex">
                                <label for="nama" class="form-label w-50">Masukkan Nama<span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3 d-flex">
                                <label for="nim" class="form-label w-50">NIM<span class="text-danger">*</span></label>
                                <input type="number" name="nim" id="nim" class="form-control" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3 d-flex">
                                <label for="nama" class="form-label w-50">Masukkan Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" min="0" class="form-control" autocomplete="off"  onblur="generateipk()" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col mb-3 d-flex">
                                <label for="phone_number" class="form-label w-50">nomor HP<span class="text-danger">*</span></label>
                                <input type="number" name="phone_number" id="phone_number" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="col mb-3 d-flex">
                                <label for="semester" class="form-label w-50">Semester saat ini<span class="text-danger">*</span></label>
                                <select class="form-select" name="semester" id= "semester" required>
                                    <option value="1" disabled selected>-- Pilih Semester--</option>
                                    <!-- perulangan untuk pemilihan semester  -->
                                    <?php
                                    for ($i = 1; $i < 9; $i++) {
                                    ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col mb-3 d-flex">
                                <label for="ipk" class="colform-label w-50">IPK Terakhir<span class="text-danger">*</span></label>
                                <div class="d-flex justify-content-between w-100">
                                    <input type="text" readonly name="ipk" id="ipk" class="form-control">
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col mb-3 d-flex">
                                <label for="beasiswa" class="form-label w-50">Pilihan Beasiswa<span class="text-danger">*</span></label>
                                <select name="beasiswa" class="form-select" id="beasiswa" disabled=false>
                                    <option readonly selected>-- Pilih Beasiswa --</option>
                                    <option value="akademik">Akademik</option>
                                    <option value="non">Non Akademik</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3 d-flex">
                                <label for="berkas" class="form-label w-50">Upload Berkas Syarat<span class="text-danger">*</span></label>
                                <input type="file" name="berkas" id="berkas" class="form-control" disabled=false>
                            </div>
                        </div>

                            <div class="mt-4 mb-2 d-flex justify-content-end row">
                                <button class="col-5 btn btn-info text-white" id="daftar" name="daftar" disabled='false'>Daftar</button>
                                <a href="index.php" class="col-5 btn btn-outline-secondary offset-2" id="cancel" disabled='false'>Cancel</a>
                            </div>
                    </form>
                    <!-- end of form -->
                </div>
            </div>
        </div>
    </div>
    <!-- container form end -->

    <!-- script for generate ipk -->
    <script>
        // function untuk mengenerate ipk dengan button enable dan disable
        function generateipk() {
            const max = 3
            const min = 1
            // gnenerate dengan fungsi math dan random serta fixed
            const ipk = Math.random().toFixed(1) * max - min + 2;
            // mengambil id untuk memanipulasi button
            document.getElementById('ipk').value = ipk;
            if (ipk >= 3.0) {
                document.getElementById('beasiswa').disabled = false;
                document.getElementById('berkas').disabled = false;
                document.getElementById('daftar').disabled = false;
            } else {
                document.getElementById('beasiswa').disabled = true;
                document.getElementById('berkas').disabled = true;
                document.getElementById('daftar').disabled = true;
            }
        }
    </script>
    
    <!-- boostrap import -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>