@extends('main')

@section('title')

@endsection

@section('content')
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-6xl text-gray-900 lg:text-8xl md:text-7xl faction_header">
                Spoilers
            </span>
        </div>
        <div class="container mx-auto mb-3">
            <div class="p-5 mx-auto bg-red-100 rounded sm:w-1/2 md:text-left">
                <div class="flex space-x-3">
                    <div class="flex flex-col space-y-2 leading-tight">
                        <div class="text-sm font-medium text-red-700">WARNING</div>
                        <div class="flex-1 text-sm leading-snug text-red-600">These cards spoilers and not
                            officially released yet. They are subject to change upon official release.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container grid mx-auto md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($spoilers as $spoiler)
            @foreach ($spoiler->minis as $mini)
                <div class="p-2 text-center">
                    <a href="{{ route('character.view', $mini->slug) }}" class="active:outline-none">
                        <img src="\storage\{{ $mini->cards->random()->front }}"
                            class="mx-auto border-2 border-black rounded-lg card__image"></a>
                    <div class="flex-1 text-sm leading-snug">From: <a href="{{ $mini->Spoilers[0]->url }}" target="_new"
                            class="font-bold hover:underline">{{ $mini->Spoilers[0]->name }}
                            ({{ $mini->Spoilers[0]->source }})</a>
                    </div>

                </div>
            @endforeach
        @endforeach
    </div>
@endsection
