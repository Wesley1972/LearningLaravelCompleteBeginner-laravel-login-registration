<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Reset Password</h3>

    <form action="{{ route('reset-password-process') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" placeholder="Enter your email"><br>
        <input type="text" name="password" placeholder="Enter your password" id=""><br>
        <input type="text" name="password_confirmation" placeholder="Re-enter Password"><br>
        <button type="submit">Save</button>
    </form>
</body>

</html>
