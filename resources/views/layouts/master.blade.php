<!DOCTYPE html>
<html>
<head>
    @include('layouts.header')
    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.nav')
    @yield('content')

    @include('layouts.footer')

    @include('layouts.js')
    @yield('js')
</div>
</body>
</html>