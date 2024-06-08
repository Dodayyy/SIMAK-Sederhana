<?php
include("koneksi.php");
$id = $_POST['id_ruangan'];
$nama = $_POST['nama_ruangan'];
$kapasitas = $_POST['kapasitas'];
$lantai = $_POST['lantai'];
$fasilitas = $_POST['fasilitas'];
$sql = "update ruangan set nama_ruangan='$nama',kapasitas='$kapasitas',lantai='$lantai',fasilitas='$fasilitas' where id_ruangan='$id'";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_ruangan.php");
}
