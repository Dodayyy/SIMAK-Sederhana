<?php
include("koneksi.php");
$kode = $_POST['kode_matkul'];
$nama = $_POST['nama_matkul'];
$sks = $_POST['sks'];
$deskripsi = $_POST['deskripsi'];
$sql = "update mata_kuliah set nama_matkul='$nama',sks='$sks',deskripsi='$deskripsi' where kode_matkul='$kode'";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_matakuliah.php");
}
