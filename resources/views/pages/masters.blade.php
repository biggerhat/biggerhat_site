@extends('main')

@section('title')
    - Masters
@endsection

@section('content')
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-6xl text-gray-900 lg:text-8xl md:text-7xl faction_header">
                Masters
            </span>
        </div>
    </div>
    <div class="block my-3 border-b border-gray-400 border-dashed"></div>

    <div class="container grid gap-0 px-2 mx-auto lg:grid-cols-4 auto-cols-fr lg:gap-2">
        @foreach ($factions as $faction)
            <div class="lg:col-span-4">
                <div class="block w-full h-full pt-5 pb-1 text-center">
                    <span
                        class="text-transparent  lg:text-8xl md:text-7xl text-4xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                        {{ $faction->name }}
                    </span>
                </div>
            </div>
            <div class="lg:col-span-2 lg:col-start-2">
                <div class="block w-full h-full py-5 text-center">
                    <p class="italic">
                        "{!! $faction->description !!}"
                    </p>
                </div>
            </div>
    </div>
    <div class="container grid gap-0 p-3 mx-auto bg-white border border-black rounded lg:grid-cols-4 auto-cols-fr lg:gap-2">
        @foreach ($faction->minis as $mini)
            <div class="text-center text-gray-900">
                <a href="{{ route('master.view', $mini->slug) }}" class="text-lg font-bold hover:underline">
                    <img src="\storage\{{ $mini->image }}" class="mx-auto">
                    {{ $mini->name }}
                </a>
            </div>
        @endforeach
    </div>
    @endforeach

    </div>

@endsection
