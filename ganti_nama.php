<?php
session_start();
include("koneksi.php");

if (!isset($_SESSION['nama_admin'])) {
    header("Location: login.php");
    exit();
}

$namaAdmin = $_SESSION['nama_admin'];

$sql = "SELECT * FROM login_admin WHERE nama_admin='$namaAdmin'";
$aksi = mysqli_query($koneksi, $sql);
$isi = mysqli_fetch_assoc($aksi);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai dari input nama_admin
    $namaAdminBaru = $_POST['nama_admin'];

    // Periksa koneksi database
    if ($koneksi->connect_error) {
        die("Koneksi database gagal: " . $koneksi->connect_error);
    }

    // Query untuk mengupdate nama_admin
    $sqlUpdateNamaAdmin = "UPDATE login_admin SET nama_admin = '$namaAdminBaru' WHERE nama_admin = '$namaAdmin'";

    if ($koneksi->query($sqlUpdateNamaAdmin) === TRUE) {
        // Jika update berhasil, tampilkan pesan berhasil
        echo 'Nama berhasil diubah!';
        $_SESSION['nama_admin'] = $namaAdminBaru;

        // Re-fetch the updated data
        $isi['nama_admin'] = $namaAdminBaru;
        header("Location: index.php");
    } else {
        // Jika update gagal, tampilkan pesan gagal
        echo 'Gagal mengubah nama. Silakan coba lagi.';
    }

    // Menutup koneksi database
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
    <link rel="shortcut icon" href="logo.ico">
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
                    <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="assets/images/Logo.png" alt="logo"><span class="logo-text">UNIVERSITAS OMBUS-OMBUS</span></a>
                </div><!--//app-branding-->
                <div class="app-card p-5 text-center shadow-sm">
                    <h3 class="page-title mb-4">Ganti Nama</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_admin" class="form-label text-start">Nama</label>
                            <input type="text" class="form-control" id="nama_admin" aria-describedby="namaAdminHelp" value="<?php echo $isi['nama_admin']; ?>" name="nama_admin">
                        </div>
                        <button type="submit" name="upload" class="btn app-btn-primary">Ganti</button>
                        <a name="upload" class="btn app-btn-primary" href="index.php">Kembali</a>
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