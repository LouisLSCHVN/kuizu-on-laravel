<x-layout>

<form method="POST">
    @csrf
    <input type="text" name="email" placeholder="email"/>
    @error('mail')
        <p>{{ $message }}</p>
    @enderror
    <input type="password" name="password" placeholder="password"/>
    @error('password')
        <p>{{ $message }}</p>
    @enderror


    @error('failed')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit">Login</button>
</form>

</x-layout>
