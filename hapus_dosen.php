<?php
include("koneksi.php");
$nidn = $_GET['x'];
$sql = "delete from dosen where nidn='$nidn'";
$aksi = mysqli_query($koneksi, $sql);
if ($aksi) {
    header("location:tampil_dosen.php");
}
