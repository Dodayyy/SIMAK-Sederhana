<?php
include("koneksi.php");
$id = $_POST['id_jadwal'];
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$matkul = $_POST['matkul'];
$pengajar = $_POST['pengajar'];
$ruangan = $_POST['ruangan'];
$sql = "update 4tic set hari='$hari',jam='$jam',matkul='$matkul',pengajar='$pengajar',ruangan='$ruangan' where id_jadwal='$id'";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_4tic.php");
}
