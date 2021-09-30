
    <div class="border border-gray-300 rounded-lg">
        @forelse ($tweets as $tweet)
            @include('_tweet') <!-- If we've tweets show them. This will be the timeline, and within it will be at any number of tweets-->
            @empty   <!-- but if we don't have tweets-->
            <p class="p-4">No tweets yet.</p>
            @endforelse
        {{ $tweets->links() }}
    </div>
