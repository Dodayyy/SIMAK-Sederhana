<?php
session_start();
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ambil nilai dari input username dan password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Periksa koneksi database
  if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
  }

  // Query untuk memeriksa username dan password di dalam database
  $sql = "SELECT * FROM login_admin WHERE username = '$username' AND password = '$password'";
  $result = $koneksi->query($sql);

  if ($result->num_rows > 0) {
    // Jika data ditemukan, simpan nama_admin dalam sesi
    $row = $result->fetch_assoc();
    $_SESSION['nama_admin'] = $row['nama_admin'];

    // Query untuk mendapatkan foto profil dari tabel login_admin berdasarkan username
    $sqlUser = "SELECT foto FROM login_admin WHERE username = '$username'";
    $resultUser = $koneksi->query($sqlUser);

    if ($resultUser->num_rows > 0) {
      $rowUser = $resultUser->fetch_assoc();
      $fotoProfil = 'assets/images/profiles/' . $rowUser['foto'];
    } else {
      // Jika tidak ditemukan foto profil, atur nilai default
      $fotoProfil = 'assets/images/profiles/student.png';
    }

    // Menampilkan informasi debugging
    echo "Foto Profil: " . $fotoProfil . "<br>";

    // Periksa apakah file foto profil ada
    if (!file_exists($fotoProfil)) {
      $fotoProfil = 'assets/images/profiles/student.png'; // Set foto profil default jika file tidak ada
    }

    // Menampilkan informasi debugging
    echo "Foto Profil yang Diperbarui: " . $fotoProfil . "<br>";

    // Simpan nama_admin dan foto_profil dalam sesi
    $_SESSION['foto_profil'] = $fotoProfil;

    // Redirect ke halaman index.php setelah login berhasil
    header("Location: index.php");
    exit();
  } else {
    // Jika data tidak ditemukan, tampilkan pesan login gagal
    echo 'Username atau password salah!';
  }

  // Menutup koneksi database
  $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Mahasiswa</title>

  <!-- Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers" />
  <meta name="author" content="Xiaoying Riley at 3rd Wave Media" />
  <link rel="shortcut icon" href="logo.ico" />

  <!-- FontAwesome JS-->
  <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

  <!-- App CSS -->
  <link id="theme-style" rel="stylesheet" href="assets/css/portal.css" />
</head>

<body class="app app-login p-0">
  <form action="" method="POST">
    <div class="row g-0 app-auth-wrapper d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-end">
          <div class="app-auth-body mx-auto">
            <div class="app-auth-branding mb-4">
              <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/Logo.png" alt="logo" /></a>
            </div>
            <h2 class="auth-heading text-center mb-5">UNIVERSITAS OMBUS-OMBUS</h2>

            <div class="auth-form-container text-start">
              <form class="auth-form login-form">
                <div class="email mb-4">
                  <label class="sr-only" for="signin-email">Username</label>
                  <input id="signin-email" name="username" type="text" class="form-control signin-email" placeholder="Username" required="required" />
                </div>
                <!--//form-group-->
                <div class="password mb-3">
                  <label class="sr-only" for="signin-password">Password</label>
                  <div class="password-wrapper">
                    <input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required" />
                    <span class="password-toggle" onclick="togglePasswordVisibility()">
                      <svg id="password-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                      </svg>
                    </span>
                  </div>
                  <script>
                    function togglePasswordVisibility() {
                      var passwordInput = document.getElementById("signin-password");
                      var passwordIcon = document.getElementById("password-icon");

                      if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        passwordIcon.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
  <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
  <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
  <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
</svg>`;
                      } else {
                        passwordInput.type = "password";
                        passwordIcon.innerHTML = `
        <svg id="password-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
        </svg>`;
                      }
                    }
                  </script>

                  <div class="extra mt-3 row justify-content-between">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="RememberPassword" />
                        <label class="form-check-label" for="RememberPassword"> Remember me </label>
                      </div>
                    </div>
                    <!--//col-6-->
                    <div class="col-6">
                      <div class="forgot-password text-end">
                        <a href="#">Forgot password?</a>
                      </div>
                    </div>
                    <!--//col-6-->
                  </div>
                  <!--//extra-->
                </div>
                <!--//form-group-->
                <div class="text-center">
                  <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                </div>
              </form>

              <div class="auth-option text-center pt-4">Belum punya akun? Silahkan <a class="text-link" href="daftar.php">Daftar</a>.</div>
            </div>
            <!--//auth-form-container-->
          </div>
          <!--//auth-body-->

          <!--//app-auth-footer-->
        </div>
        <!--//flex-column-->
      </div>
      <!--//auth-main-col-->

      <!--//auth-background-col-->
    </div>
  </form>
  <!--//row-->
</body>

</html>