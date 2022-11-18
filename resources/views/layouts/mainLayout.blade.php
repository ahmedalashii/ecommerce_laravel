<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('admin-panel/images/dashboard-logo.svg') }}" type="image/x-icon" />
    <title>SHOPPING STORES Dashboard</title>

    @include('includes.css.allStyles')

</head>

<body>
    @include('includes.html.aside')
    @yield('MainContent')
    @include('includes.js.allJS')
</body>

</html>
