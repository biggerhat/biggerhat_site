@extends('main')

@section('title')

@endsection

@section('content')
    <div class="container mx-auto">
        <div class="container flex mx-auto">

            <div class="mx-auto text-center">
                <div class="flex flex-col p-10 space-y-3">
                    <div class="w-full p-5 bg-blue-100 border-l-4 border-blue-500 rounded">
                        <div class="flex space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="flex-none w-4 h-4 text-blue-500 fill-current">
                                <path
                                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z" />
                            </svg>
                            <div class="flex-1 text-sm leading-tight text-blue-700">Check out all the newest spoilers and
                                unreleased characters on our <a href="{{ route('spoilers') }}"
                                    class="font-bold hover:underline">Spoilers</a> page! </div>
                        </div>
                    </div>
                </div>
                <div class="block mt-10 text-xl">Bigger Hat is a comprehensive Malifaux 3rd Edition database and more!</div>
                <div class="px-2 my-2">
                    <form method="POST" action="{{ route('results') }}" autocomplete="off">
                        @csrf
                        <input type="text"
                            class="w-full p-1 text-lg bg-gray-200 border border-gray-900 rounded focus:outline-none"
                            autofocus name="search" placeholder="Search for Anything">
                    </form>
                </div>
                <div class="mx-auto my-1">
                    <a href="{{ route('advanced') }}"
                        class="inline-block p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
                        Advanced Search</a>
                    <a href="{{ route('random') }}"
                        class="inline-block p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
                        Random Character</a>
                </div>
            </div>
        </div>
        <div class="container grid mx-auto mt-15 lg:grid-cols-3 lg:gap-2">
            <div class="mx-1 mb-2 sm:my-2">
                <div class="shadow-lg">
                    <div class="pane-title bg-gray-900">
                        Our Latest Tacticas
                    </div>
                    <div class="pane-body font-bold">
                        @foreach ($tacticas as $tactica)
                            <a href="{{ route('tactica.view', $tactica->slug) }}" class="block mb-2 hover:underline">
                                {{ $tactica->name }}
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
