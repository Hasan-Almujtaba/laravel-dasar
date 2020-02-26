<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Laravel Blog | @yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    @yield('style')
</head>

<body>
    @include('layout.menu')
    @yield('body')
    @yield('script')
</body>

</html>
