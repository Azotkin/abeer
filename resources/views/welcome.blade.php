<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme=" --bs-tertiary-color">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <title>Доставка</title>
        <link rel="icon" href="assets/img/fevicon.png">

        <!-- Stylesheet -->

        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700;800&family=Bebas+Neue&family=Satisfy&family=Quattrocento:wght@400;700&display=swap" rel="stylesheet">


        @vite([
    'resources/js/app.js',
    'resources/js/ui/vendor/counterup.js',
    'resources/js/ui/vendor/demos.js',
    'resources/js/ui/vendor/bootstrap.min.js',
    'resources/js/ui/vendor/jquery.3.6.min.js',
    'resources/js/ui/vendor/jquery-ui.min.js',
    'resources/js/ui/vendor/owl.min.js',
    'resources/js/ui/vendor/ripple.js',
    'resources/js/ui/vendor/magnific.min.js',
    'resources/js/ui/vendor/ripple.min.js',
    'resources/js/ui/vendor/slick-slider.min.js',
    'resources/js/ui/vendor/tweenmax.min.js',
    'resources/js/ui/vendor/waypoint.min.js',
    'resources/js/ui/vendor/wow.min.js',
    'resources/js/ui/main.js',
'resources/css/app.css',

 'resources/css/ui/vendor/animate.min.css',
 'resources/css/ui/vendor/bootstrap.min.css',
 'resources/css/ui/vendor/fontawesome.min.css',
 'resources/css/ui/vendor/jquery-ui.min.css',
 'resources/css/ui/vendor/magnific.min.css',
 'resources/css/ui/vendor/owl.min.css',
 'resources/css/ui/vendor/responsive.css',
 'resources/css/ui/vendor/slick-slide.min.css',
  'resources/css/ui/style.css',
])
    </head>
    <body class="antialiased">
    <div id="app"></div>

    </body>
</html>
