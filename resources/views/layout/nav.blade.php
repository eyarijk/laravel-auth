<nav>
    <ul>
        @if(Auth::guest())
            <li>
                <a href="{{ route('login.form') }}">Login</a>
            </li>
            <li>
                <a href="{{ route('register.form') }}">Register</a>
            </li>
        @else
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('logout') }}">Logout</a>
            </li>
        @endif
    </ul>
</nav>
