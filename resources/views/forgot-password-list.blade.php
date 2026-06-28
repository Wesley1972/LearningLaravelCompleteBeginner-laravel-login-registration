<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if ($tokens->isEmpty())
        There is no reset link
    @else
        <table>
            @foreach ($tokens as $token)
                <tr>
                    <td>{{ $token->email }}</td>
                    <td>
                        {{-- email is sent to the web.php --}}
                        <form action="{{ route('token-link', $token->email) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
</body>

</html>
