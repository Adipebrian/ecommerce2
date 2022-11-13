<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/layout.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/login.css">
</head>

<body>
	<section class="login">
		<div class="box">
			<div class="heading">Login</div>
			<div class="subheading"><?= view('Myth\Auth\Views\_message_block') ?></div>
			<form action="<?= url_to('login') ?>" method="POST" enctype="multipart/form-data">
				<?= csrf_field() ?>

				<?php if ($config->validFields === ['email']) : ?>
					<div class="form-group">
						<label for="login"><?= lang('Auth.email') ?></label>
						<input type="email" id="login" name="login" placeholder="<?= lang('Auth.email') ?>" value="<?= old('login') ?>" <?php if (session('errors.login')) : ?>class="invalid" <?php endif ?> required>
						<div class="red">
							<?= session('errors.login') ?>
						</div>
					</div>
				<?php else : ?>
					<div class="form-group">
						<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
						<input type="text" id="login" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" value="<?= old('login') ?>" <?php if (session('errors.login')) : ?>class="invalid" <?php endif ?>required>
						<div class="red">
							<?= session('errors.login') ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="form-group">
					<label for="password"><?= lang('Auth.password') ?></label>
					<input type="password" id="password" name="password" placeholder="<?= lang('Auth.password') ?>" required>
					<div class="red">
						<?= session('errors.password') ?>
					</div>
				</div>
				<?php if ($config->allowRegistration) : ?>
					<a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
				<?php endif; ?>
				<?php if ($config->activeResetter) : ?>
					<a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
				<?php endif; ?>
				<button type="submit" class="font2"><?= lang('Auth.loginAction') ?></button>
			</form>
		</div>
	</section>
</body>

</html>