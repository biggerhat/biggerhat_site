@extends('main')

@section('title')

@endsection

@section('content')
    <div class="container flex mx-auto">
        <div class="m-auto mt-48 text-center">
            <div class="block text-xl ">Bigger Hat is a comprehensive Malifaux 3rd Edition database and more!</div>
            <div class="px-2 my-2">
                <form method="POST" action="{{ route('results') }}" autocomplete="off">
                    @csrf
                    <input type="text"
                        class="w-full p-1 text-lg bg-gray-200 border border-gray-900 rounded focus:outline-none"
                        name="search" placeholder="Search for Anything">
                </form>
            </div>
            <a href="{{ route('advanced') }}"
                class="inline-block p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
                Advanced Search</a>
            <a href="{{ route('random') }}"
                class="inline-block p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
                Random Character</a>
        </div>
    </div>

@endsection
