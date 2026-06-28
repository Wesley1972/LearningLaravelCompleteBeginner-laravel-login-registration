<h2>
    Register</h2>

<form action="{{ route('register.process') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">

    @error('name')
        <span role="alert">{{ $message }}</span>
    @enderror <br>

    <input type="text" name="email" placeholder="Email">

    @error('email')
        <span role="alert">{{ $message }}</span>
    @enderror <br>

    <input type="text" name="password" placeholder="Password">

    @error('password')
        <span role="alert">{{ $message }}</span>
    @enderror <br>

    <input type="text" id="" name="password_confirmation" placeholder="Confirm Password"><br>
    <button type="submit">Register</button>
</form>
