<?php
include("koneksi.php");
$kode = $_GET['x'];
$sql = "delete from mata_kuliah where kode_matkul='$kode'";
$aksi = mysqli_query($koneksi, $sql);
if ($aksi) {
    header("location:tampil_matakuliah.php");
}
