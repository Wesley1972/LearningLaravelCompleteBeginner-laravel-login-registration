<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>

    @if (session('status'))
        <p class="notice">{{ session('status') }}</p>
    @endif

    <h2>Login page</h2>
    <a href="{{ route('homepage') }}">Back to homepage</a><br>
    <form action="{{ route('login.process') }}" method="post">
        @csrf
        <input type="text" name="name" id="" placeholder="Name" value="{{ old('name') }}">

        @error('name')
            <span role="alert">{{ $message }}</span>
        @enderror <br>

        <input type="text" name="password" id="" placeholder="Password">

        @error('password')
            <span role="alert">{{ $message }}</span>
        @enderror <br>

        <label for="remember">
            <input type="checkbox" id="remember" name="remember"
                {{ old('remember') == 'on' ? 'checked' : '' }}>Remember me
        </label><br>

        <button type="submit">Login</button>

    </form>
</body>

</html>
