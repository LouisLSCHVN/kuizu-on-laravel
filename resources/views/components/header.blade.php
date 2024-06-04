<header>

    <nav>
        <a href="{{ route('home') }}">Home</a>
        @auth
            <form action="{{ route("logout") }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
        @guest
            <a href="{{ route("auth.login") }}">Login</a>
            <a href="{{ route("auth.register") }}">Register</a>
        @endguest
    </nav>

</header>