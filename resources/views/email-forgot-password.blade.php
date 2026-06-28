<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Reset Password Page</h3>
    
    <p>Your are receiving this email because a forgot password link has requested or something. Lol</p>

    <a href="{{ route('reset-password-form', $token) }}">Click here to reset your password</a>

    <p>If you did not request a password reset, you can ignore this message.</p>

</body>

</html>
