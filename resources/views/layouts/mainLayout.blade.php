<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Administration Dashboard</title>

    @include('includes.css.allStyles')

</head>

<body>
    @include('includes.html.aside')
    @yield('MainContent')
    @include('includes.js.allJS')
</body>

</html>
