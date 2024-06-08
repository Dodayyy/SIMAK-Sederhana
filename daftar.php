<!DOCTYPE html>
<html lang="en">

<head>
	<title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="logo.ico">

	<!-- FontAwesome JS-->
	<script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app app-signup p-0">
	<div class="row g-0 app-auth-wrapper d-flex justify-content-center align-items-center">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4">
						<a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/logo.png" alt="logo"></a>
					</div>
					<h2 class="auth-heading text-center mb-4">Daftar Akun</h2>

					<div class="auth-form-container text-start">
						<form action="simpan_admin.php" method="POST" class="auth-form auth-signup-form">

							<div class="email mb-4">
								<label class="sr-only" for="signin-email">Username</label>
								<input id="signin-email" name="nama_admin" type="text" class="form-control signin-email" placeholder="Nama" required="required" />
							</div>

							<div class="email mb-4">
								<label class="sr-only" for="signin-email">Username</label>
								<input id="signin-email" name="username" type="text" class="form-control signin-email" placeholder="Username" required="required" />
							</div>

							<div class="password mb-4">
								<label class="sr-only" for="signin-password">Password</label>
								<div class="password-wrapper">
									<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" name="password" required="required" />
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
							</div>

							<label for="exampleInputEmail1" class="form-label">Foto Profil</label>
							<div class="email mb-4">
								<label class="sr-only" for="signup-email">Profil</label>
								<select class="form-select" aria-label="Default select example" name="foto">
									<option value="man.png">Man</option>
									<option value="woman.png">Woman</option>
								</select>
							</div>
					</div><!--//extra-->

					<div class="text-center">
						<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Daftar</button>
					</div>
					</form><!--//auth-form-->

					<div class="auth-option text-center pt-3">Sudah punya akun? <a class="text-link" href="login.php">Log in</a></div>
				</div><!--//auth-form-container-->
			</div><!--//auth-body-->
		</div><!--//flex-column-->
	</div><!--//auth-main-col-->

	</div><!--//row-->


</body>

</html>