<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Forgot Password</h3>
    <form action=" {{ route('forgot.password.process') }} " method="post">
        @csrf
        <input type="email" name="email" placeholder="Enter Email" required><br>

        <button type="submit">Submit</button><br>
        <a href="{{ route('homepage') }}">Back to home</a>
</body>

</html>
