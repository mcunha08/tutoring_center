<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
</head>

<body>

    @include('partials.nav')
    <div class="container">

        @yield('content')

    </div><!-- /.container -->

    @include('partials.footer')

</body>
</html>
