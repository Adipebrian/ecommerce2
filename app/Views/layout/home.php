<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Niaga Jaya | Home</title>
    <meta name="author" content="Niaga Jaya">
    <meta name="name" content="Niaga Jaya">
    <meta name="description" content="Website Ecomerce yang menyediakan banyak produk yang berkualitas">
    <meta name="keywords" content="produk berkualitas" />
    <meta name="robots" content="index, follow">
    <meta name="thumbnail" content="https://niagajaya.id/assets/img/logo.png">

    <meta itemprop="name" content="Niaga Jaya">
    <meta itemprop="description" content="Website Ecomerce yang menyediakan banyak produk yang berkualitas">
    <meta itemprop="image" content="https://niagajaya.id/assets/img/logo.png">

    <meta property="og:url" content="https://niagajaya.id/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Niaga Jaya" />
    <meta property="og:description" content="Website Ecomerce yang menyediakan banyak produk yang berkualitas">
    <meta property="og:image" itemprop="image" content="https://niagajaya.id/banner.jpg" />
    <meta property="og:image:secure_url" content="https://niagajaya.id/banner.jpg" />
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">

    <meta property="article:author" content="https://niagajaya.id">
    <meta property="article:section" content="website">

    <meta name="twitter:title" content="Niaga Jaya">
    <meta name="twitter:description" content="Website Ecomerce yang menyediakan banyak produk yang berkualitas">
    <meta name="twitter:image" content="https://niagajaya.id/assets/img/logo.png">
    <meta name="twitter:card" content="summary_large_image">



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