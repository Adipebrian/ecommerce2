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
            <div class="heading"><?= lang('Auth.forgotPassword') ?></div>
            <div class="subheading"><?= view('Myth\Auth\Views\_message_block') ?></div>
            <p><?= lang('Auth.enterEmailForInstructions') ?></p>
            <form action="<?= url_to('forgot') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="email"><?= lang('Auth.emailAddress') ?></label>
                    <input type="email" id="email" name="email" placeholder="<?= lang('Auth.emailAddress') ?>" value="<?= old('email') ?>" <?php if (session('errors.email')) : ?>class="invalid" <?php endif ?> required>
                    <div class="red">
                        <?= session('errors.email') ?>
                    </div>
                </div>

                <button type="submit" class="font2"><?= lang('Auth.sendInstructions') ?></button>
            </form>
        </div>
    </section>
</body>

</html>