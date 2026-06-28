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

    <form action=" {{ route('reset.password.process') }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="reset-password" placeholder="Reset Password"><br>
        <input type="text" name="confirm-password" placeholder="Confirm Password"><br>
        <button type="submit">Reset Password</button>
    </form>
@else
    <a href="{{ route('register') }}">Register</a><br>
    <a href="{{ route('login') }}">Login</a><br>
    <a href="{{ route('forgot.password') }}">Forgot Password</a><br>
    <a href="{{ route('list-forgot-password-links') }}">View forgot password links</a><br>
    <a href="{{ route('users-list') }}">View Users</a>
@endauth
