<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }} - 
                <a href="{{ route('actors') }}">
                    {{ __('Actors') }} - 
                    <a href="{{ route('edit_actor') }}">
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
                    @foreach($actors as $actor)
                    <form method="POST" action="{{ route('update_actor') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $actor->id }}"/>
                        <div>
                            <x-label for="first_name" value="{{ __('First Name') }}" />
                            <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ $actor->first_name }}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="last_name" value="{{ __('Last Name') }}" />
                            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ $actor->last_name }}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="years" value="{{ __('Years') }}" />
                            <x-input id="years" class="block mt-1 w-full" type="number" name="years" value="{{ $actor->years }}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="description" value="{{ __('Description') }}" />
                            <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="description" rows="5" required autofocus>{{ $actor->description }}</textarea>
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