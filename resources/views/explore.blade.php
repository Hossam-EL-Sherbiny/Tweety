<x-app>
    <divf>
        @foreach($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center mb-5">
            <img
                src="{{ $user->avatar }}"
                alt="{{ $user->userName }}'s avatar"
                width="60"
                class="mr-4"
            >

            <div>
                <h4 class="font-bold">{{ '@'. $user->username }}</h4>
            </div>
            </a>
        @endforeach
    </divf>
</x-app>
