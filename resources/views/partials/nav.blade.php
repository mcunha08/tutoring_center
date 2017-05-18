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
            <li>
                <a href="/search">Search Tutors</a>
            </li>

        @if(!Auth::check())
                <li>
                    <a  href="/login">Login</a>
                </li>
            @endif
            @if(Auth::check())
                <li>
                    <a  href="/logout">Logout</a>
                </li>
            @endif
            @if(Auth::check())
                <li>
                    <a  href="/tutors_list/{{ Auth::user()->id }}">Hello, {{ Auth::user()->firstname }}</a>
                </li>
            @endif

        </ul>
    </div>

    <br/>
    </div>

</nav>