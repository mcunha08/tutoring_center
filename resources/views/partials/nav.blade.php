<nav>
    <div class="nav">
        <ul>
            <li>
                <a href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @if(!Auth::check())
                <li>
                    <a href="/register">Create an Account</a>
                </li>
            @endif
            <li>
                <a href="/tutors">View Tutors</a>
            </li>
            @if(Auth::check() && auth()->user()->role_id != 1)
            <li>
                <a href="/search">Search Tutors</a>
            </li>
            @endif
        @if(Auth::check() &&  auth()->user()->role_id == 1)
            <li><a href="/supersecret">Instructor Page</a></li>

            @endif
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
            <li>
            <a href="https://woututoringcenter.hipchat.com">Chat</a>
            </li>
        </ul>
    </div>

    <br/>
    </div>

</nav>