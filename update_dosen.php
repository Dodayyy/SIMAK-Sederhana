<?php
include("koneksi.php");
$nidn = $_POST['nidn'];
$nama = $_POST['nama_dosen'];
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$sql = "update dosen set nama_dosen='$nama',jenkel='$jenkel',alamat='$alamat',telepon='$telepon' where nidn='$nidn'";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_dosen.php");
}
