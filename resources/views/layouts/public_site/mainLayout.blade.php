<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('icon.svg') }}" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UMBRELLA STORES</title>

    @include('includes.public_site.fonts.allFonts')
    @include('includes.public_site.css.allStyles')
</head>

<body>
    @include('includes.public_site.html.header')
    @yield('MainContent')
    @include('includes.public_site.html.footer')
    @include('includes.public_site.js.allJS')
</body>

</html>
