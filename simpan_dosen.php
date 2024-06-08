<?php
include("koneksi.php");
$nidn = $_POST['nidn'];
$nama = $_POST['nama_dosen'];
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

// proses simpan database

$sql = "insert into dosen values('$nidn','$nama','$jenkel','$alamat','$telepon')";
$proses = mysqli_query($koneksi, $sql);
if ($proses) {
    header("location:tampil_dosen.php");
}
