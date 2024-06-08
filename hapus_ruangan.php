<?php
include("koneksi.php");
$id = $_GET['x'];
$sql = "delete from ruangan where id_ruangan='$id'";
$aksi = mysqli_query($koneksi, $sql);
if ($aksi) {
    header("location:tampil_ruangan.php");
}
