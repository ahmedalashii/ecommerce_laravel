<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('admin-panel/images/dashboard-icon.svg') }}" type="image/x-icon" />
    <title>UMBRELLA STORES Dashboard</title>

    @include('includes.admin.css.allStyles')
    @stack('popUpConfirmationStyles')

</head>

<body>
    @include('includes.admin.html.aside')
    @yield('MainContent')
    @include('includes.admin.js.allJS')
</body>

</html>
