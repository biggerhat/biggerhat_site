@section('title')
    - {{ $faction->name }}
@endsection

<div>
    <div class="container grid w-full grid-cols-8 gap-0 px-2 mx-auto lg:px-0 lg:gap-16">
        @foreach($factions as $headerFaction)
            <div><a href="/factions/{{$headerFaction->id}}/{{Str::slug($headerFaction->name,'-')}}"><img src="\storage\{{$headerFaction->image}}" alt="{{$headerFaction->name}}" @if($headerFaction->id != $faction->id) class="opacity-25" @endif></a></div>
        @endforeach    
    </div>
    <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 md:grid-cols-9">
        <div class="md:col-span-5 md:col-start-3">
            <div class="block w-full h-full py-5 text-center">
                <span class="text-transparent  text-8xl bg-clip-text bg-gradient-to-br from-{{$faction->bg_color}} via-gray-700 to-{{$faction->bg_color}} faction_header">
                    {{$faction->name}}
                </span>
            </div>
        </div>
    </div>
</div>