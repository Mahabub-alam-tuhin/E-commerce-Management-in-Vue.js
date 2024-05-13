<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr" data-theme="theme-default" data-assets-path="/adminAsset/" data-template="vertical-menu-template-dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>admin</title>

    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/vuexy_admin" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="/adminAsset/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/adminAsset/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="/adminAsset/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/adminAsset/vendor/css/rtl/core-dark.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/adminAsset/vendor/css/rtl/theme-default-dark.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/adminAsset/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/adminAsset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/adminAsset/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="/adminAsset/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/adminAsset/vendor/libs/select2/select2.css" />
    <script src="/adminAsset/vendor/js/helpers.js"></script>
    <script src="/adminAsset/vendor/js/template-customizer.js"></script>
    <script src="/adminAsset/js/config.js"></script>


    {{-- push link  --}}
    <script src=(node_modules/push.js/bin/push.min.js,public/adminAsset/js/push.min.js)></script>
    <script src="/adminAsset/js/push.min.js"></script>
    <script src="/adminAsset/vendor/libs/jquery/jquery.js"></script>
    <script src="/adminAsset/vendor/libs/popper/popper.js"></script>
    <script src="/adminAsset/vendor/js/bootstrap.js"></script>
    <script src="/adminAsset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    {{-- <script src="/adminAsset/vendor/libs/node-waves/node-waves.js"></script> --}}

    {{-- <script src="/adminAsset/vendor/libs/hammer/hammer.js"></script> --}}
    {{-- <script src="/adminAsset/vendor/libs/i18n/i18n.js"></script> --}}
    <script src="/adminAsset/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="/adminAsset/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <!-- Main JS -->
    <script src="/adminAsset/js/main.js"></script>
    <script src="/adminAsset/js/sweat_alert.js"></script>

    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
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

<body id="app">
    <!-- Layout wrapper -->
    <app></app>
    <!-- / Layout wrapper -->

    <!-- Page JS -->
    @yield('scripts')
    @stack('cjs')
</body>

</html>


<!-- beautify ignore:end -->
