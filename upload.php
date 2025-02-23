<?php
session_start();
include("koneksi.php");

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['nama_admin'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nama_admin dari sesi
    $namaAdmin = $_SESSION['nama_admin'];

    // Periksa koneksi database
    if ($koneksi->connect_error) {
        die("Koneksi database gagal: " . $koneksi->connect_error);
    }

    // Upload file foto
    $targetDirectory = "assets/images/profiles/";
    $targetFile = $targetDirectory . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Periksa apakah file adalah gambar
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Periksa apakah file sudah ada
    if (file_exists($targetFile)) {
        echo "File sudah ada.";
        $uploadOk = 0;
    }

    // Batasi jenis file yang diizinkan
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        echo "Hanya file JPG, JPEG, dan PNG yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Periksa apakah terjadi kesalahan saat upload file
    if ($uploadOk == 0) {
        echo "File tidak dapat diupload.";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
            // Jika upload berhasil, simpan nama file ke dalam tabel login_admin
            $fotoProfil = basename($_FILES["foto"]["name"]);
            $updateQuery = "UPDATE login_admin SET foto = '$fotoProfil' WHERE nama_admin = '$namaAdmin'";
            if ($koneksi->query($updateQuery) === true) {
                // Simpan nama_admin dan foto_profil dalam sesi
                $_SESSION['foto_profil'] = $targetDirectory . $fotoProfil;

                // Redirect ke halaman index.php setelah upload berhasil
                header("Location: index.php");
                exit();
            } else {
                echo "Terjadi kesalahan saat menyimpan foto.";
            }
        } else {
            echo "Terjadi kesalahan saat upload file.";
        }
    }

    // Tutup koneksi database
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app app-404-page">

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
                <div class="app-branding text-center mb-5">
                    <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">PORTAL</span></a>
                </div><!--//app-branding-->
                <div class="app-card p-5 text-center shadow-sm">
                    <h3 class="page-title mb-4">UPLOAD</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="foto"></label>
                        <input type="file" name="foto" id="foto">
                        <br>
                        <br>
                        <button type="submit" class="btn app-btn-primary">Upload</button>
                    </form>
                </div>
            </div><!--//col-->
        </div><!--//row-->
    </div><!--//container-->

    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script>
    <script src="assets/js/charts-custom.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>