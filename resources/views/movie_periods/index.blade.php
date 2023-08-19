<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }} - 
                <a href="{{ route('movie_periods') }}">
                    {{ __('Movie Periods') }}
                </a> 
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    <h1 style="padding-top: 10px; font-weight: bold;" class="font-xl mb-4 text-center">Movie Periods - List</h1>
                    <hr />
                    @foreach ($movie_periods as $movie_period)
                        <div style="display: flex; width: 57%; justify-content: space-between" class="p-2">
                            <div>{{ $loop->iteration }}. </div>
                            <div>{{ $movie_period->period }}</div>
                        </div>
                    @endforeach
                    {{ $movie_periods->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
