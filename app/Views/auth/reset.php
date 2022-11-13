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
			<div class="heading"><?= lang('Auth.resetYourPassword') ?></div>
			<div class="subheading"><?= view('Myth\Auth\Views\_message_block') ?></div>
			<p><?= lang('Auth.enterCodeEmailPassword') ?></p>
			<form action="<?= url_to('reset-password') ?>" method="post">
				<?= csrf_field() ?>
				<div class="group">
					<div class="form-group">
						<label for="token"><?= lang('Auth.token') ?></label>
						<input type="text" id="token" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>" <?php if (session('errors.token')) : ?>class="invalid" <?php endif ?> required>
						<div class="red">
							<?= session('errors.token') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="email"><?= lang('Auth.email') ?></label>
						<input type="email" id="email" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" <?php if (session('errors.email')) : ?>class="invalid" <?php endif ?> required>
						<div class="red">
							<?= session('errors.email') ?>
						</div>
					</div>
				</div>
				<div class="group">
					<div class="form-group">
						<label for="password"><?= lang('Auth.newPassword') ?></label>
						<input type="password" id="password" name="password" placeholder="<?= lang('Auth.password') ?>" required autocomplete="off" <?php if (session('errors.password')) : ?>class="invalid" <?php endif ?>>
					</div>
					<div class="form-group">
						<label for="pass_confirm"><?= lang('Auth.newPasswordRepeat') ?></label>
						<input type="password" id="pass_confirm" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" required autocomplete="off" <?php if (session('errors.pass_confirm')) : ?>class="invalid" <?php endif; ?>>
					</div>
				</div>

				<button type="submit" class="font2"><?= lang('Auth.resetPassword') ?></button>
			</form>
		</div>
	</section>
</body>

</html>