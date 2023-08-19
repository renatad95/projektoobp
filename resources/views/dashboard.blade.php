<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-3">
                <h1 style="padding-top: 10px; font-weight: bold;" class="font-xl mb-4 text-center">Complex Queries</h1>
                <hr />
                <div class="grid grid-cols-5 gap-5 p-4 justify-items-center">
                    <div>
                        <h1>Query 1.</h1>
                        <hr />
                        @foreach($actor_with_most_movies as $most_frequent_actor)
                            <p>{{ $loop->iteration }}. {{ $most_frequent_actor->first_name }} {{ $most_frequent_actor->last_name }} - {{ $most_frequent_actor->brojac }}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Query 2.</h1>
                        <hr />
                        @foreach($oldest_actors as $oldest_actor)
                            <p>{{ $loop->iteration }}. {{ $oldest_actor->years }} - {{ $oldest_actor->brojac }}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Query 3.</h1>
                        <hr />
                        @foreach($period_with_most_movies as $most_frequent_period)
                            <p>{{ $loop->iteration }}. {{ $most_frequent_period->period }} - {{ $most_frequent_period->brojac }}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Query 4.</h1>
                        <hr />
                        @foreach($genre_with_most_movies as $most_frequent_genre)
                            <p>{{ $loop->iteration }}. {{ $most_frequent_genre->name }} - {{ $most_frequent_genre->brojac }}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Query 5.</h1>
                        <hr />
                        @foreach($genre_with_specific_actor as $genre_specific_actor)
                            <p>{{ $loop->iteration }}. {{ $genre_specific_actor->name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
