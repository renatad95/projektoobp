<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }} - 
                <a href="{{ route('actors') }}">
                    {{ __('Actors') }}
                </a> 
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    <a href="/add_actor" class="m-2 p-2 justify-end inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase float-right">Add Actor</a>
                    <h1 style="padding-top: 10px; font-weight: bold;" class="font-xl mb-4 text-center">Actors - List</h1>
                    <hr />
                    @foreach ($actors as $actor)
                        <div class="flex space-x-6">
                            <div class="flex-1">
                                <p class="p-2">{{ $actor->first_name }} {{ $actor->last_name }}</p>
                            </div>
                            <div class="flex-1">
                                <p class="p-2">{{ $actor->years }}</p>
                            </div>
                            <div class="flex-1">
                                <p class="p-2">{{ $actor->description }}</p>
                            </div>
                            <div class="flex-1">
                                <form method="POST" action="{{ route('delete_actor') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $actor->id }}">
                                    <div class="p-2">
                                        <button class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                                            {{ __('Delete') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex-1">
                                <form method="POST" action="{{ route('edit_actor') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $actor->id }}">
                                    <div class="p-2">
                                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase">
                                            {{ __('Edit') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex-1">
                                <form method="POST" action="{{ route('file_add') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $actor->id }}">
                                    <div class="p-2">
                                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-purple-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase">
                                            {{ __('Add File') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
