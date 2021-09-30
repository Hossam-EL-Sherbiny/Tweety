@unless(current_user()->is($user))
    <form method="POST" action="{{ route('follow', $user->username) }}">
        @csrf
        <button
            type="submit"
            class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white text-xs">
        {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me' }} <!-- let's first check if the current user is following to given user, and that case we should say unFollow Me otherwise Follow Me-->
        </button>
    </form>
@endunless
