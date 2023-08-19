<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }} - 
                <a href="{{ route('movies') }}">
                    {{ __('Movies') }} - 
                    <a href="{{ route('edit_movie') }}">
                        {{ __('Edit') }}
                    </a>
                </a>
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach($movies as $movie)
                    <form method="POST" action="{{ route('update_movie') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $movie->id }}"/>
                        <div class="columns-2">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $movie->name }}" required autofocus />
                            <x-label for="grade" value="{{ __('Grade') }}" />
                            <x-input id="grade" class="block mt-1 w-full" type="text" name="grade" value="{{ $movie->grade }}" required autofocus />
                        </div> 
                        <div class="mt-4">
                            <x-label for="description" value="{{ __('Description') }}" />
                            <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="description" rows="5" required autofocus>{{ $movie->description }}</textarea>
                        </div>
                        <div class="columns-3 mt-4">
                            <x-label for="actor" value="{{ __('Actor') }}" />
                            <select id="actor" name="actor" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="true" disabled="disabled">Choose</option>
                                @foreach($actors as $actor)
                                    <option value="{{ $actor->id }}" @if($movie->actor == $actor->id) selected @endif>
                                        {{$actor->first_name}} {{$actor->last_name}}
                                    </option>
                                @endforeach
                            </select>
                            <x-label for="genre" value="{{ __('Genre') }}" />
                            <select id="genre" name="genre" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="true" disabled="disabled">Choose</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" @if($movie->genre == $genre->id) selected @endif>
                                        {{$genre->name}}
                                    </option>
                                @endforeach
                            </select>
                            <x-label for="movie_period" value="{{ __('Movie Period') }}" />
                            <select id="movie_period" name="movie_period" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="true" disabled="disabled">Choose</option>
                                @foreach($movie_periods as $movie_period)
                                    <option value="{{ $movie_period->id }}" @if($movie->movie_period == $movie_period->id) selected @endif>
                                        {{$movie_period->period}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>