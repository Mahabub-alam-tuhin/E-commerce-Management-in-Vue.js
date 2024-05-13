<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- css --}}
    <link rel="icon" type="image/png" href="/frontEndAsset/images/favicon.png">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/frontEndAsset/css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/frontEndAsset/css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/frontEndAsset/css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="/frontEndAsset/css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="/frontEndAsset/css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="/frontEndAsset/css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/frontEndAsset/css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="/frontEndAsset/css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/frontEndAsset/css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="/frontEndAsset/css/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="/frontEndAsset/css/reset.css">
    <link rel="stylesheet" href="/frontEndAsset/css/style.css">
    <link rel="stylesheet" href="/frontEndAsset/css/responsive.css">


    <!-- Jquery -->
    <script src="/frontEndAsset/js/jquery.min.js"></script>
    <script src="/frontEndAsset/js/jquery-migrate-3.0.0.js"></script>
    <script src="/frontEndAsset/js/jquery-ui.min.js"></script>
    <!-- Popper JS -->
    <script src="/frontEndAsset/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="/frontEndAsset/js/bootstrap.min.js"></script>
    <!-- Color JS -->
    {{-- <script src="/frontEndAsset/js/colors.js"></script> --}}
    <!-- Slicknav JS -->
    <script src="/frontEndAsset/js/slicknav.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="/frontEndAsset/js/owl-carousel.js"></script>
    <!-- Magnific Popup JS -->
    <script src="/frontEndAsset/js/magnific-popup.js"></script>
    <!-- Waypoints JS -->
    <script src="/frontEndAsset/js/waypoints.min.js"></script>
    <!-- Countdown JS -->
    <script src="/frontEndAsset/js/finalcountdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="/frontEndAsset/js/nicesellect.js"></script>
    <!-- Flex Slider JS -->
    <script src="/frontEndAsset/js/flex-slider.js"></script>
    <!-- ScrollUp JS -->
    <script src="/frontEndAsset/js/scrollup.js"></script>
    <!-- Onepage Nav JS -->
    <script src="/frontEndAsset/js/onepage-nav.min.js"></script>
    <!-- Easing JS -->
    <script src="/frontEndAsset/js/easing.js"></script>
    <!-- Active JS -->
    <script src="/frontEndAsset/js/active.js"></script>
    <script src="/frontEndAsset/js/sweat_alert.js"></script>

    @vite(['resources/js/frontend.js', 'resources/sass/app.scss'])
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
        window.toaster = function toaster(message = "success", icon = "success") {
            Toast.fire({
                icon: icon,
                title: message,
            });
        };
    </script>

</head>

<body>
    <div id="app">
        <app></app>
    </div>
</body>

</html>
