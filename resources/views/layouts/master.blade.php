<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
</head>

<body>

    @include('partials.nav')
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div><!-- /.container -->

    <div class="alert alert-error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
    @include('partials.footer')

</body>
</html>
