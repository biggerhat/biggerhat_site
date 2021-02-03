@section('title')
    - {{ $faction->name }}
@endsection

<div>
    <div class="container grid w-full grid-cols-8 gap-0 px-2 mx-auto lg:px-0 lg:gap-16">
        @foreach($factions as $headerFaction)
            <div><a href="/factions/{{$headerFaction->id}}/{{Str::slug($headerFaction->name,'-')}}"><img src="\storage\{{$headerFaction->image}}" alt="{{$headerFaction->name}}" @if($headerFaction->id != $faction->id) class="opacity-25" @endif></a></div>
        @endforeach    
    </div>
    <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-9 auto-cols-fr">
        <div class="lg:col-span-9">
            <div class="block w-full h-full py-5 text-center">
                <span class="text-transparent  lg:text-8xl md:text-7xl text-5xl bg-clip-text bg-gradient-to-br from-{{$faction->bg_color}} via-gray-700 to-{{$faction->bg_color}} faction_header">
                    {{$faction->name}}
                </span>
            </div>
        </div>
        <div class="lg:col-span-5 lg:col-start-3">
            <div class="block w-full h-full py-5 text-center">
                <p class="italic"> 
                    "{!! $faction->description !!}"
                </p>
            </div>
        </div>
    </div>

    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-4 auto-cols-fr">
        <div class="lg:col-span-4">
            <div class="block w-full h-full py-2 text-center">
                <span class="text-transparent lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{$faction->bg_color}} via-gray-700 to-{{$faction->bg_color}} faction_header">
                    Statistics
                </span>
            </div>
        </div>
        
    </div>
    
    
    <!--
    <div class="container grid mx-auto auto-cols-fr lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-x-2">
        <div class="mx-1 mb-2 sm:my-2">
            <div class="bg-gray-200 border-2 border-black rounded">
                <div class="block p-1 mb-2 text-xl font-medium text-white border-b border-black bg-{{$faction->bg_color}}">
                    Description
                </div>
                <div class="mx-2 mb-2">
                    "{!! $faction->description !!}"
                </div>
            </div>
        </div>

        <div class="mx-1 mb-2 sm:my-2">
            <div class="bg-gray-200 border-2 border-black rounded">
                <div class="block p-1 mb-2 text-xl font-medium text-white border-b border-black bg-{{$faction->bg_color}}">
                    Statistics
                </div>
                <div class="mx-2 mb-2">
                    <span class="block text-lg font-semibold">Unique Characters: {{ $uniqueCharacters }}</span>
                    <span class="block text-lg font-semibold">Total Models: {{ $totalCharacters }}</span>
                    <span class="block text-lg font-semibold">Average Stats: </span>
                    <div class="inline-block w-16 h-16 bg-{{ $faction->bg_color }} py-1 px-4 text-white rounded-full text-center">
                        <span class="block font-serif text-3xl text-bold">{{ $averageDf }}</span>
                        <span class="block text-sm">Df</span>
                    </div>
                    <div class="inline-block w-16 h-16 bg-{{ $faction->bg_color }} py-1 px-4 text-white rounded-full text-center">
                        <span class="block m-auto font-serif text-3xl text-bold">{{ $averageWp }}</span>
                        <span class="block text-sm">Wp</span>
                    </div>
                    <div class="inline-block w-16 h-16 bg-{{ $faction->bg_color }} py-1 px-4 text-white rounded-full text-center">
                        <span class="block font-serif text-3xl text-bold">{{ $averageMv }}</span>
                        <span class="block text-sm">Mv</span>
                    </div>
                    <div class="inline-block w-16 h-16 bg-{{ $faction->bg_color }} py-1 px-4 text-white rounded-full text-center">
                        <span class="block font-serif text-3xl text-bold">{{ $averageWounds }}</span>
                        <span class="block text-sm">Wds</span>
                    </div>
                    <div class="inline-block w-16 h-16 bg-{{ $faction->bg_color }} py-1 px-4 text-white rounded-full text-center">
                        <span class="block font-serif text-3xl text-bold">{{ $averageCost }}</span>
                        <span class="block text-sm">Cost</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-1 mb-2 sm:my-2">
            <div class="bg-gray-200 border-2 border-black rounded">
                <div class="block p-1 mb-2 text-xl font-medium text-white border-b border-black bg-{{$faction->bg_color}}">
                    Tactica
                </div>
                <div class="mx-2 mb-2">
                    @if(!$faction->tactica)
                        This faction hasn't had a tactica submitted yet. Contact us to submit one today.
                    @else
                        {{$faction->tactica}}
                    @endif
                    
                </div>
            </div>
        </div>
    </div> -->

    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    @if($showMasters)
        <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-4 auto-cols-fr">
            <div class="lg:col-span-4">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-transparent lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{$faction->bg_color}} via-gray-700 to-{{$faction->bg_color}} faction_header">
                        Masters
                    </span>
                </div>
            </div>
            @foreach($masters as $mini)
            <div class="p-2">
                <a href="/characters/{{$mini->id}}/{{ Str::slug($mini->name,'-') }}" class="active:outline-none"><img src="\storage\{{$mini->cards[0]->front}}" class="mx-auto rounded-lg card__image"></a>
            </div>
            @endforeach
        </div>
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    @endif
    @if($showHenchmen)
        <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-4 auto-cols-fr">
            <div class="lg:col-span-4">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-transparent lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{$faction->bg_color}} via-gray-700 to-{{$faction->bg_color}} faction_header">
                        Henchmen
                    </span>
                </div>
            </div>
            @foreach($henchmen as $mini)
            <div class="p-2">
                <a href="/characters/{{$mini->id}}/{{ Str::slug($mini->name,'-') }}" class="active:outline-none"><img src="\storage\{{$mini->cards[0]->front}}" class="mx-auto rounded-lg card__image"></a>
            </div>
            @endforeach
        </div>
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    @endif
    @if($showEnforcers)
        <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-4 auto-cols-fr">
            <div class="lg:col-span-4">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-transparent lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{$faction->bg_color}} via-gray-700 to-{{$faction->bg_color}} faction_header">
                        Enforcers
                    </span>
                </div>
            </div>
            @foreach($enforcers as $mini)
            <div class="p-2">
                <a href="/characters/{{$mini->id}}/{{ Str::slug($mini->name,'-') }}" class="active:outline-none"><img src="\storage\{{$mini->cards[0]->front}}" class="mx-auto rounded-lg card__image"></a>
            </div>
            @endforeach
        </div>
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    @endif
    @if($showMinions)
        <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-4 auto-cols-fr">
            <div class="lg:col-span-4">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-transparent lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{$faction->bg_color}} via-gray-700 to-{{$faction->bg_color}} faction_header">
                        Minions
                    </span>
                </div>
            </div>
            @foreach($minions as $mini)
            <div class="p-2">
                <a href="/characters/{{$mini->id}}/{{ Str::slug($mini->name,'-') }}" class="active:outline-none"><img src="\storage\{{$mini->cards[0]->front}}" class="mx-auto rounded-lg card__image"></a>
            </div>
            @endforeach
        </div>
    @endif




       
</div>