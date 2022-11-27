<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Niaga Jaya | Home</title>
    <meta name="author" content="<?= seo()->author ?>">
    <meta name="name" content="<?= seo()->name ?>">
    <meta name="description" content="<?= seo()->desc ?>">
    <meta name="keywords" content="<?= seo()->keyword ?>" />
    <meta name="robots" content="index, follow">
    <meta name="thumbnail" content="<?= seo()->img ?>">

    <meta itemprop="name" content="<?= seo()->name ?>">
    <meta itemprop="description" content="<?= seo()->desc ?>">
    <meta itemprop="image" content="<?= seo()->img ?>">

    <meta property="og:url" content="https://niagajaya.id/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= seo()->name ?>" />
    <meta property="og:description" content="<?= seo()->desc ?>">
    <meta property="og:image" itemprop="image" content="https://niagajaya.id/banner.jpg" />
    <meta property="og:image:secure_url" content="https://niagajaya.id/banner.jpg" />
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">

    <meta property="article:author" content="https://niagajaya.id">
    <meta property="article:section" content="website">

    <meta name="twitter:title" content="<?= seo()->name ?>">
    <meta name="twitter:description" content="<?= seo()->desc ?>">
    <meta name="twitter:image" content="<?= seo()->img ?>">
    <meta name="twitter:card" content="summary_large_image">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/layout.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive.css" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <style>
        .product-all {
            display: flex;
            flex-direction: column;
            padding-bottom: 40px;
        }

        .product-all .nav-product {
            display: flex;
            width: 100%;
            background-color: #fff;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            padding: 20px;
        }

        .product-all .nav-product .record {
            width: 25%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-all .nav-product ul {
            width: 75%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
            margin-left: 40px;
        }

        .product-all .nav-product ul li.active {
            border: 1px solid black;
        }

        .product-all .nav-product ul li {
            max-width: 150px;
            border-radius: 20px;
            text-align: center;
            padding: 5px;
            list-style: none;
        }

        .product-all .nav-product ul li a {
            text-decoration: none;
            color: #000;
            font-size: 10px;
        }

        .product-all .group {
            display: flex;
            width: 100%;
        }

        .product-all .group .sidebar-product {
            display: flex;
            flex-direction: column;
            width: 25%;
            height: max-content;
            align-items: center;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            background-color: #fff;
            padding: 20px;
            border-radius: 0px 0px 20px 0px;
            padding-bottom: 40px;
        }

        .product-all .group .sidebar-product .box {
            display: flex;
            width: 250px;
            flex-direction: column;
            margin-top: 20px;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            padding: 20px;
            border-radius: 10px;
            align-items: center;
        }

        .product-all .group .sidebar-product .box ul {
            margin-top: 10px;
        }

        .product-all .group .sidebar-product .box ul li {
            list-style: none;
        }

        .product-all .group .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .product-all .group .boxContainer {
            width: 75vw;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            justify-items: center;
            align-content: center;
            padding: 20px;
        }

        .product-all .boxContainer .box:hover {
            box-shadow: 6px 6px 6px rgba(0, 0, 0, 0.25);
            border: 4px solid black;
        }

        .product-all .boxContainer .box.none {
            display: none;
        }

        .product-all .boxContainer .box {
            width: 220px;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border-radius: 10px;
            background: #ffffff;
            border: 4px double black;
            text-decoration: none;
            color: #000;
            text-align: center;
        }

        .product-all .boxContainer .box img {
            width: 100px;
        }

        .product-all .boxContainer .box .title {
            font-size: 1rem;
            font-weight: 600;
            margin-top: 10px;
        }

        .product-all .boxContainer .box .harga {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 10px 0px;
        }

        .product-all .boxContainer .box .harga .disc {
            font-size: 12px;
            text-decoration: line-through;
            color: red;
        }

        .product-all .boxContainer .box .harga .netto {
            font-size: 20px;
            font-weight: bold;
        }

        .product-all .boxContainer .box .cart .icon_chart {
            width: 25px;
            height: 25px;
            margin-left: 10px;
        }

        .product-all .boxContainer .box .cart {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2px 20px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            color: #000;
        }

        .product-all .boxContainer .box .cart:hover {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), inset 2px 4px 4px rgba(0, 0, 0, 0.25);
        }

        .more {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #42c2ff;
            width: max-content;
            padding: 5px 20px;
            border-radius: 20px;
            text-align: center;
            text-decoration: none;
            color: #000;
        }

        .more:hover {
            cursor: pointer;
            background-color: #42c2ff;
            color: #f2f2f2;
        }

        @media screen and (max-width: 576px) {
            .product-all .nav-product {
                flex-direction: column-reverse;
                justify-content: center;
                align-items: center;
            }

            .product-all .nav-product ul {
                grid-template-columns: repeat(auto-fit, minmax(90px, 1fr));
                margin-bottom: 20px;
            }

            .product-all .group .sidebar-product {
                display: none;
            }

            .product-all .group .sidebar-product.active {
                display: flex;
                position: absolute;
                width: 200px;
            }

            .product-all .group .sidebar-product .box {
                width: 180px;
                margin-top: 50px;
            }

            .product-all .group {
                position: relative;
            }

            .product-all .btn-filter.none {
                display: none;
            }

            .product-all .btn-filter {
                position: absolute;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
                border: 1px solid;
                width: max-content;
                padding: 5px;
                background-color: #fff;
                border-radius: 5px;
                top: 20px;
                left: 20px;
                z-index: 999;
            }

            .product-all .btn-filter i.icon-filter {
                background-image: url(/assets/img/filter.png);
                background-position: center;
                background-size: cover;
                width: 30px;
                height: 30px;
            }

            .product-all .boxContainer {
                width: 100vw;
            }
        }
    </style>
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