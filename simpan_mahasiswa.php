<?php
include("koneksi.php");
$nim = $_POST['txtnim'];
$nama = $_POST['txtnama'];
$jenkel = $_POST['txtjenkel'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];

// proses simpan database

$sql = "insert into mahasiswa values('$nim','$nama','$jenkel','$alamat','$kelas')";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_mahasiswa.php");
}
