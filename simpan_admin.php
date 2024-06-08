<?php
include("koneksi.php");
$id = $_POST['id'];
$nama = $_POST['nama_admin'];
$username = $_POST['username'];
$password = $_POST['password'];
$foto = $_POST['foto'];

// proses simpan database

$sql = "insert into login_admin values('$id','$nama','$username','$password','$foto')";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    echo  'Pendaftaran Berhasil';
    header("location:daftar.php");
} else {
    header("location:daftar.php");
    echo  'Pendaftaran Gagal';
}
