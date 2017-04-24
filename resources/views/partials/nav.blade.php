<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Create an Account</a>
            </li>
            @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link disabled" href="/login">Login</a>
                </li>
            @endif
            @if(Auth::check())
                <li>
                    <a class="blog-nav-item" href="#">Hello, {{ Auth::user()->firstname }}</a>
                </li>
            @endif
        </ul>

    </div>

</nav>