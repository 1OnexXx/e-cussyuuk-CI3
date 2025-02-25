<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Kuyy</title>
	<!-- Bootstrap 5 CSS CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="card shadow" style="width: 24rem;">
			<div class="card-body p-4">
				<h2 class="card-title text-center mb-4">Login</h2>
				<form action="<?= base_url('auth') ?>" method="post">
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username" value="<?= set_value('username') ?>">
						<?= form_error('username', '<small class="text-danger">', '</small>') ?>
						<?php if ($this->session->flashdata('error_username')): ?>
							<small class="text-danger"><?= $this->session->flashdata('error_username') ?></small>
						<?php endif; ?>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
						<?= form_error('password', '<small class="text-danger">', '</small>') ?>
						<?php if ($this->session->flashdata('error_password')): ?>
							<small class="text-danger"><?= $this->session->flashdata('error_password') ?></small>
						<?php endif; ?>
					</div>
					<button type="submit" class="btn btn-primary w-100">Login</button>
				</form>
				<p class="text-center mt-3">
					Belum punya akun? <a href="<?= base_url('auth/register') ?>" class="text-decoration-none">Daftar disini</a>
				</p>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
