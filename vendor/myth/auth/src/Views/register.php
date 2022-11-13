<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/layout.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/login.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive.css">
</head>

<body>
	<section class="login">
		<div class="box">
			<div class="heading"><?= lang('Auth.register') ?></div>
			<div class="subheading"> <?= view('Myth\Auth\Views\_message_block') ?></div>
			<form action="<?= url_to('register') ?>" method="post">
				<?= csrf_field() ?>
				<div class="group">
					<div class="form-group">
						<label for="username"><?= lang('Auth.username') ?></label>
						<input type="text" id="username" name="username" placeholder="<?= lang('Auth.username') ?>" required <?php if (session('errors.username')) : ?>class="invalid" <?php endif ?> value="<?= old('username') ?>">
					</div>
					<div class="form-group">
						<label for="email"><?= lang('Auth.email') ?></label>
						<input type="email" id="email" name="email" placeholder="<?= lang('Auth.email') ?>" required <?php if (session('errors.email')) : ?>class="invalid" <?php endif ?> value="<?= old('email') ?>">
					</div>
				</div>
				<div class="group">
					<div class="form-group">
						<label for="nohp">No. Telp.</label>
						<input type="number" id="nohp" name="nohp" placeholder="08-__-___" required>
					</div>
					<div class="form-group">
						<label for="tgllhr">Tanggal Lahir</label>
						<input type="date" id="tgllhr" name="tgllhr" required>
					</div>
				</div>
				<div class="group">
					<div class="form-group">
						<input type="hidden" name="image" value="default.png">
						<label for="password"><?= lang('Auth.password') ?></label>
						<input type="password" id="password" name="password" placeholder="<?= lang('Auth.password') ?>" required autocomplete="off" <?php if (session('errors.password')) : ?>class="invalid" <?php endif ?>>
					</div>
					<div class="form-group">
						<label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
						<input type="password" id="pass_confirm" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" required autocomplete="off" <?php if (session('errors.pass_confirm')) : ?>class="invalid" <?php endif; ?>>
					</div>
				</div>
				<a href="<?= url_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a>
				<button type="submit" class="font2"><?= lang('Auth.register') ?></button>
			</form>
		</div>
	</section>
</body>

</html>