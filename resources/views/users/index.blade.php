<x-layout>
    <h1>Users</h1>

    <ul>
        @foreach ($users as $user)
            <li>
                <a href="/users/{{ $user->username }}">
                    {{ $user->username }}
                </a>
            </li>
        @endforeach
    </ul>

</x-layout>