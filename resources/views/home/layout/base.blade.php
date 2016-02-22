<!DOCTYPE html>
<html>
<head>
    @include('home/includes.head')
</head>
<!-- /header -->
<!-- menubar -->
<header>
    @include('home/includes.header')
</header>
<!-- content -->
<body>
    @yield('content')
</body>
<!-- footer -->
<footer>
    @include('home/includes.footer')
</footer>
</html>