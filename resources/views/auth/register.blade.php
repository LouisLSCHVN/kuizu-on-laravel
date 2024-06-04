<x-layout>

<form method="POST">
    @csrf

    <input type="text" name="username" placeholder="username"/>
    @error('username')
        <p>{{ $message }}</p>
    @enderror
    <input type="text" name="email" placeholder="email"/>
    @error('email')
        <p>{{ $message }}</p>
    @enderror
    <input type="password" name="password" placeholder="password"/>
    @error('password')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit">Register</button>
</form>

</x-layout>
