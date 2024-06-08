<?php
include("koneksi.php");
$nim = $_POST['txtnim'];
$nama = $_POST['txtnama'];
$jenkel = $_POST['txtjenkel'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$sql = "update mahasiswa set nama='$nama',jenkel='$jenkel',alamat='$alamat',kelas='$kelas' where nim='$nim'";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_mahasiswa.php");
}
