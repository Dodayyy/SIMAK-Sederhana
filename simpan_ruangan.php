<?php
include("koneksi.php");
$id = $_POST['id_ruangan'];
$nama = $_POST['nama_ruangan'];
$kapasitas = $_POST['kapasitas'];
$lantai = $_POST['lantai'];
$fasilitas = $_POST['fasilitas'];

// proses simpan database

$sql = "insert into ruangan values('$id','$nama','$kapasitas','$lantai','$fasilitas')";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_ruangan.php");
}
