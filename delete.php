<?php
include("koneksi.php");
$nim = $_GET['x'];

// Mendapatkan informasi mahasiswa sebelum menghapus
$query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
$result = mysqli_query($koneksi, $query);
$mahasiswa = mysqli_fetch_assoc($result);

// Jika data mahasiswa ditemukan, tampilkan peringatan konfirmasi
if ($mahasiswa) {
    $nama = $mahasiswa['nama'];
    echo "<script>
        var confirmed = confirm('Apakah Anda yakin ingin menghapus data mahasiswa $nama?');
        if (confirmed) {
            window.location.href = 'hapus.php?x=$nim';
        } else {
            window.location.href = 'data.php';
        }
    </script>";
} else {
    // Jika data mahasiswa tidak ditemukan, langsung arahkan kembali ke halaman data
    header("location:data.php");
}
