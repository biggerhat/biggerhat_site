@extends('main')

@section('title')
    - Search Results
@endsection

@section('content')
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full py-5 text-center">
            <div class="text-6xl text-gray-900 lg:text-8xl md:text-7xl faction_header">
                Search Results
            </div>
            <div class="font-bold text-gray-900 font-xl">
                for "<span class="italic">{{ $search }}</span>"</div>
        </div>
    </div>

    @if (count($minis) > 0)
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>

        <div class="container mx-auto mb-2 text-center">
            <div class="block w-full h-full py-5 text-center">
                <span class="text-3xl text-gray-900 lg:text-5xl md:text-4xl faction_header">
                    Characters
                </span>
            </div>
        </div>
        <div class="container grid gap-0 px-2 mx-auto lg:grid-cols-3 xl:grid-cols-4 auto-cols-fr lg:gap-2">
            @foreach ($minis as $mini)
                <div class="p-2">
                    <a href="{{ route('character.view', $mini->slug) }}" class="active:outline-none">
                        <img src="\storage\{{ $mini->cards->random()->front }}"
                            class="mx-auto border-2 border-black rounded-lg card__image"></a>
                </div>
            @endforeach
        </div>
    @endif

    @if (count($upgrades) > 0)
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>

        <div class="container mx-auto mb-2 text-center">
            <div class="block w-full h-full py-5 text-center">
                <span class="text-3xl text-gray-900 lg:text-5xl md:text-4xl faction_header">
                    Upgrades
                </span>
            </div>
        </div>
        <div class="container grid gap-0 px-2 mx-auto lg:grid-cols-3 xl:grid-cols-4 auto-cols-fr lg:gap-2">
            @foreach ($upgrades as $upgrade)
                <div class="p-2">
                    <a href="{{ route('upgrade.view', $upgrade->slug) }}" class="active:outline-none">
                        <img src="\storage\{{ $upgrade->image }}"
                            class="mx-auto border-2 border-black rounded-lg card__image"></a>
                </div>
            @endforeach
        </div>
    @endif
@endsection
