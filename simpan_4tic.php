<?php
include("koneksi.php");
$id = $_POST['id_jadwal'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$matkul = $_POST['matkul'];
$pengajar = $_POST['pengajar'];
$ruangan = $_POST['ruangan'];

// proses simpan database

$sql = "insert into 4tic values('$id','$hari','$jam','$matkul','$pengajar','$ruangan')";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_4tic.php");
}
