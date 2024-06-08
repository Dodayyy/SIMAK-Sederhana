<?php
include("koneksi.php");
$kode = $_POST['kode_matkul'];
$nama = $_POST['nama_matkul'];
$sks = $_POST['sks'];
$deskripsi = $_POST['deskripsi'];

// proses simpan database

$sql = "insert into mata_kuliah values('$kode','$nama','$sks','$deskripsi')";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_matakuliah.php");
}
