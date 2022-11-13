<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/layout.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive.css" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body>

    <?= $this->include('layout/home/navbar') ?>
    <?= $this->renderSection('content') ?>
    <?= $this->include('layout/home/footer') ?>
    <!-- jQuery -->
    <script src="<?= base_url() ?>/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/script.js"></script>
    <script>
        const flashDataSuccess = $('.flash-data-success').data('flashdata');
        const flashDataWarning = $('.flash-data-warning').data('flashdata');
        var Toast = Swal.mixin({
            position: 'center',
            showConfirmButton: true,
            timer: 3000
        });
        if (flashDataSuccess) {
            Toast.fire({
                icon: 'success',
                title: flashDataSuccess,
            })
        }
        if (flashDataWarning) {
            Toast.fire({
                icon: 'warning',
                title: flashDataWarning
            })
        }

        var btn_top = $('#button-top');
        var btn_wa = $('#button-wa');

        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn_top.addClass('show');
                btn_wa.addClass('show');
            } else {
                btn_top.removeClass('show');
                btn_wa.removeClass('show');
            }
        });

        btn_top.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
        });
    </script>
</body>

</html>