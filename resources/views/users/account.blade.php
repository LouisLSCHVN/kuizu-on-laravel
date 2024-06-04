
<x-layout>
    <h1>User Account</h1>

    <form action="{{ route("users.update") }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="{{ $user->username }}">
        </div>
        @error('username')
            <p>{{ $message }}</p>
        @enderror

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $user->email }}">
        </div>
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <div>
            <label for="bio">Bio</label>
            <input type="text" name="bio" value="{{ $user->bio }}">
        </div>
        @error('bio')
            <p>{{ $message }}</p>
        @enderror


        <div>
            <label for="profile_avatar">Avatar</label>
            @if ($user->profile_picture)
                <img src="/storage/{{ $user->profile_picture }}" alt="Your avatar">
            @endif
            <input type="file" name="profile_picture" id="profile_picture"  >
        </div>
        @error('profile_picture')
            <p>{{ $message }}</p>
        @enderror


       <button type="submit">Save</button>

    </form>

</x-layout>