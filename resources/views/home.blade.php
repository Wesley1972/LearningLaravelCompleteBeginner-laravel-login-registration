<h2>Welcome</h2>

@if (session('status'))
    <p class="notice">{{ session('status') }}</p>
@endif

@auth
    <h3>Welcome {{ Auth::user()->name }}</h3>

    <a href="{{ route('dashboard') }}">Dashboard</a>

    <form action="{{ route('logout.process') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

@else
    <a href="{{ route('register') }}">Register</a>
    <a href="{{ route('login') }}">Login</a>
@endauth
