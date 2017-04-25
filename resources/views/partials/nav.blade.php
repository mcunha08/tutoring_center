<nav>


    <div class="nav">
        <ul>
            <li>
                <a href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li>
                <a href="/register">Create an Account</a>
            </li>
            <li>
                <a href="/tutors">View Tutors</a>
            </li>
            @if(!Auth::check())
                <li>
                    <a  href="/login">Login</a>
                </li>
            @endif
            @if(Auth::check())
                <li>
                    <a  href="#">Hello, {{ Auth::user()->firstname }}</a>
                </li>
            @endif
        </ul>
    </div>
        {{--<ul class="navbar-nav mr-auto">--}}
            {{----}}
        {{--</ul>--}}


</nav>