<?php
include("koneksi.php");
$id = $_GET['x'];
$sql = "delete from 4tic where id_jadwal='$id'";
$aksi = mysqli_query($koneksi, $sql);
if ($aksi) {
    header("location:tampil_4tic.php");
}
