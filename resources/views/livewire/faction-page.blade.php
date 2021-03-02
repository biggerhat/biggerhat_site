@section('title')
    - {{ $faction->name }}
@endsection

<div>
    <div class="container grid w-full grid-cols-8 gap-0 px-2 mx-auto lg:px-0 lg:gap-16">
        @foreach ($factions as $headerFaction)
            <div><a href="{{ route('faction.view', $headerFaction->slug) }}" class="active:outline-none"><img
                        src="\storage\{{ $headerFaction->image }}" alt="{{ $headerFaction->name }}" @if ($headerFaction->id != $faction->id) class="opacity-25" @endif></a></div>
        @endforeach
    </div>
    <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-9 auto-cols-fr">
        <div class="lg:col-span-9">
            <div class="block w-full h-full py-5 text-center">
                <span
                    class="text-transparent  lg:text-8xl md:text-7xl text-4xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                    {{ $faction->name }}
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

    <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-2 auto-cols-fr">
        <div class="mb-2 text-center lg:col-span-2">
            <div class="block w-full h-full py-2 text-center">
                <span
                    class="text-transparent lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                    Statistics
                </span>
            </div>
        </div>

        <div class="grid w-full grid-cols-5 mx-auto mb-2 lg:px-2 auto-cols-fr auto-rows-min">
            <div class="col-span-5 mb-2 text-center">
                <div class="block w-full h-full py-2 text-center">
                    <span
                        class="text-transparent lg:text-4xl text-3xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                        Averages
                    </span>
                </div>
            </div>
            <div class="text-center">
                <div class="inline-block mx-auto text-sm font-bold text-center">
                    Defense
                    <div
                        class="block w-16 h-16 bg-{{ $faction->bg_color }} text-white rounded-full text-center mx-auto align-middle table-cell text-5xl text-bold border-2 border-gray-900 average font-mono">
                        {{ $statistics['averageDf'] }}
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="inline-block mx-auto text-sm font-bold text-center">
                    Willpower
                    <div
                        class="block w-16 h-16 bg-{{ $faction->bg_color }} text-white rounded-full text-center mx-auto align-middle table-cell text-5xl text-bold border-2 border-gray-900 average font-mono">
                        {{ $statistics['averageWp'] }}
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="inline-block mx-auto text-sm font-bold text-center">
                    Move
                    <div
                        class="block w-16 h-16 bg-{{ $faction->bg_color }} text-white rounded-full text-center mx-auto align-middle table-cell text-5xl text-bold border-2 border-gray-900 average font-mono">
                        {{ $statistics['averageMv'] }}
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="inline-block mx-auto text-sm font-bold text-center">
                    Wounds
                    <div
                        class="block w-16 h-16 bg-{{ $faction->bg_color }} text-white rounded-full text-center mx-auto align-middle table-cell text-5xl text-bold border-2 border-gray-900 average font-mono">
                        {{ $statistics['averageWounds'] }}
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="inline-block mx-auto text-sm font-bold text-center">
                    Cost
                    <div
                        class="block w-16 h-16 bg-{{ $faction->bg_color }} text-white rounded-full text-center mx-auto align-middle table-cell text-5xl text-bold border-2 border-gray-900 average font-mono">
                        {{ $statistics['averageCost'] }}
                    </div>
                </div>
            </div>
            <div class="col-span-5 mb-2">
                <div class="grid grid-cols-4 mx-auto">
                    <div class="text-center">
                        <div class="block mx-auto text-sm font-bold text-center">
                            Engagement
                            <div
                                class="block w-16 h-16 bg-{{ $faction->bg_color }} text-white relative rounded-full text-center mx-auto align-middle p-2 text-5xl text-bold border-2 border-gray-900 average font-mono">
                                {{ $statistics['averageMeleeRange'] }}
                            </div>
                            Range
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="inline-block mx-auto text-sm font-bold text-center">
                            <div class="icon baseline" id="melee" style="margin-right: -5px;"><svg width="32"
                                    height="32" viewBox="0 0 32 32">
                                    <path id="icon-info"
                                        d="M22.080 3.424v0.128q0 0.224-0.448 0.64-0.544 0.512-0.576 0.864-1.248 1.344-2.112 2.688h-0.32q0 0.416-0.48 0.864-0.448 0.512-0.288 0.992-0.064 0.032-0.224 0.096-0.16 0.032-0.192 0.064 0.096 0.384-0.352 1.248-0.384 0.832-0.064 1.376-0.256 0.032-0.48 0.352t-0.448 0.416q0 0.32 0.064 0.32 0 0.128-0.224 0.16t-0.256 0.096q-0.064 0.064-0.096 0.256 0 0.192-0.096 0.352-0.064 0.096-0.256 0.064 0.224 0.672-0.256 0.832-0.16 0.032-0.224-0.064-0.096-0.16-0.192-0.192 0 0.16 0.032 0.64t0.032 0.8q0 0.224-0.16 0.544t-0.48 0.384q0.096 0.48-0.288 1.44-0.384 0.992-0.224 1.44-0.32-0.032-0.416 0.096t-0.064 0.32q0.064 0.192-0.032 0.416 0 0.032-0.416 0.896t-0.416 1.344q-0.064 0-0.192 0.064-0.096 0.032-0.192 0.032-0.064-0.032-0.128-0.096-0.288 0.768-0.288 1.312-0.032 0.512 0.128 1.248-0.256-0.032-0.672 0.128 0 0.224-0.128 0.512t-0.128 0.448q-0.064 0-0.16-0.064-0.096-0.032-0.16-0.032 0.032 0.416 0.032 0.544t-0.064 0.48-0.064 0.512q-0.128-0.352-0.16-0.704v-0.256q0-0.224 0.032-0.544 0.096-0.416 0.096-0.704 0.064-0.256 0.192-0.8 0.128-0.576 0.16-0.736 0.096-0.352 0.608-1.6 0.48-1.28 0.512-2.080 0.16 0 0.256-0.096 0.128-0.064 0.16-0.256t0.064-0.256v-0.736q0.384-0.608 0.8-2.144 0.448-1.504 0.8-2.176-0.064-0.96 0.704-1.472 0-0.096-0.064-0.192-0.064-0.128-0.032-0.256 0.064-0.096 0.32-0.384 0.288-0.288 0.416-0.48 0.16-0.256 0.096-0.48 0.096-0.096 0.448-0.416 0.352-0.352 0.48-0.608 0.16-0.288 0.16-0.736 0.096 0 0.16-0.128 0.064-0.096 0.192-0.064 0.224-0.8 1.056-1.856t1.056-1.504q0.768-0.512 1.856-1.664 1.088-1.184 1.6-1.632zM23.84 5.376v0.096q-0.128 0.16-0.448 0.544-0.32 0.416-0.544 0.768-0.224 0.32-0.352 0.608-0.064 0.096-0.128 0.448-0.032 0.352-0.128 0.512-0.096 0.128-0.448 0.448-0.352 0.352-0.544 0.704-0.16 0.32-0.096 0.768-0.064 0.032-0.16 0.064t-0.16 0.064q-0.032 0-0.096 0.032-0.032 0.064-0.128 0.128-0.032 0.032-0.064 0.096-0.064 0.064-0.096 0.128-0.032 0.416 0 0.736 0.032 0.384-0.064 0.704-0.096 0.288-0.352 0.448 0.256 0.544 0.128 0.992-0.16 0.416-0.448 0.768-0.288 0.288-0.48 0.736-0.224 0.384-0.128 0.832-0.096 0.064-0.192 0.064-0.128 0-0.224-0.032-0.064-0.064-0.128-0.064-0.032 0-0.032 0.128t0.096 0.64q0.128 0.544 0.064 0.96-0.416 0.224-0.48 0.768t-0.064 1.088q0 0.608-0.288 0.928-0.128 0-0.192-0.096-0.096-0.128-0.224-0.096 0 0.256 0.256 0.544 0.224 0.32 0.224 0.544-0.256 0.128-0.416 0.64-0.192 0.576-0.32 0.736-0.032 0.128 0.032 0.32t0.032 0.32q-0.096 0.064-0.192 0.064-0.064 0-0.128-0.064t-0.128-0.064q-0.032 0-0.032 0.128-0.192 0.32-0.032 1.056 0.128 0.736 0.096 0.832-0.352-0.032-0.448 0.32-0.096 0.288 0.032 0.768-0.064 0-0.16-0.032-0.128-0.032-0.192-0.032t-0.16 0.064q0.032 0.064 0.096 0.544t0.096 0.8q-0.32-0.48-0.384-1.184v-0.384q0-0.48 0.096-0.928 0.128-0.64 0.288-1.472t0.16-1.408q0.288-0.352 0.448-0.512-0.128-0.32 0.096-1.344 0.224-1.088 0.128-1.504 0.416-0.864 0.256-1.184 0.352-0.704 0.512-2.304 0.352-0.736 1.12-2.336t1.152-2.528q0.032-0.16-0.064-0.448-0.064-0.288 0.064-0.32 1.216-0.768 1.088-1.568 0.224 0.064 0.352-0.128 0.096-0.16 0.224-0.128 0.8-1.632 2.208-2.72zM17.088 0q-0.128 0.352-0.896 0.896-0.8 0.608-0.768 1.184-0.096 0-0.192-0.064-0.128-0.064-0.256-0.032-0.064 0.128-0.16 0.416-0.096 0.256-0.16 0.384-0.736 0.256-1.664 1.376t-1.696 1.408q-0.16 0.256-0.224 0.96t-0.192 0.928q-0.096 0.16-0.384 0.224-0.288 0.096-0.32 0.32-0.224 0.288 0 0.896l-2.016 2.048q-0.032 0.096-0.032 0.32 0 0.16-0.064 0.288-0.064 0.16-0.224 0.224-0.256 0.096-0.384-0.064-0.128-0.192-0.224-0.192 0 0.416-0.064 1.184t-0.096 1.12q-0.672 0.032-1.184 0.992 0.288 0.32 0.16 0.896-0.16 0.416-0.48 0.192 0.096 0.192 0.064 0.384t-0.096 0.256q-0.032 0.064-0.128 0.192-0.128 0.128-0.192 0.288-0.16 0-0.32-0.16t-0.256-0.224q0.192 1.28-0.224 2.24-0.256 0.544-0.64 0.32-0.096 0.064-0.192 0.224-0.064 0.192-0.096 0.32 0 0.096-0.032 0.256v0.224h-0.672q-0.512 1.472-0.416 2.496-0.096 0.192-0.288 0.032-0.16-0.128-0.32-0.096-0.096 0.096-0.128 0.288-0.064 0.192-0.128 0.416-0.032 0.256-0.064 0.384-0.032 0.096-0.256 0.032-0.192-0.064-0.352-0.032-0.064 0.224-0.064 0.864t-0.256 0.896q-0.064-0.128-0.128-0.448-0.096-0.32-0.128-0.416 0.32-1.216 1.12-3.072 0.768-1.856 1.056-2.72 1.088-0.736 1.536-2.944 0.224-0.192 0.48-0.928 0.256-0.8 0.608-0.96 0.032-0.096-0.032-0.256t-0.064-0.288q0.448 0 0.512-0.352-0.096-0.32 0.448-1.152t0.384-1.344q0.288-0.064 0.864-0.864 0.544-0.864 0.992-1.024 0.032-0.16 0.192-0.48 1.76-1.504 2.688-3.872 0.352-0.064 0.8-0.32t0.544-0.288q0.608-0.736 1.312-1.344 0.704-0.576 1.792-1.312 1.088-0.768 1.536-1.12h0.064zM16.416 5.728q-0.192 0.032-0.416 0.288t-0.512 0.288q-0.032 0.256 0.032 0.576 0.096 0.32 0.064 0.512-0.192 0.096-0.64 0-0.416-0.096-0.64 0-0.704 0.992-0.992 3.040-0.128 0.032-0.384 0.16t-0.48 0.096q0 0.224 0.224 0.448 0.192 0.16 0.128 0.48-0.544-0.064-0.832 0.16 0.256 0.416-0.096 1.088-0.32 0.704-0.256 0.96-0.064 0.032-0.288 0.224-0.256 0.256-0.384 0.352 0.096 0.608-0.128 1.056-0.256 0.512-0.768 0.992t-0.704 0.736q-0.032 0.16 0.096 0.256 0.096 0.128 0.064 0.256l-0.192 0.224q-0.16 0.192-0.384 0.16 0.256 0.288-0.16 1.152t-0.256 1.312q-0.064 0-0.32 0.096-0.288 0.128-0.352 0.128-0.064-0.032-0.352-0.096 0.032 0.16 0.096 0.32 0.096 0.128 0.224 0.256t0.192 0.224q0 0.16-0.224 0.352-0.192 0.16-0.128 0.48-0.128 0.032-0.224-0.032t-0.16-0.16q-0.064-0.128-0.096-0.16-0.096 0.16-0.032 0.608 0.032 0.448 0.192 0.608-0.288 0.352-0.672 0.384-0.032 0.192 0.032 0.352 0.064 0.192 0.064 0.352-0.288 0.224-0.608 0.16l0.064 0.192q0.064 0.192 0.032 0.416-1.024 1.152-0.928 2.336-0.128 0.256-0.512 0.256 0 0.128 0.096 0.384 0.128 0.256 0.128 0.384 0.032 0.16-0.064 0.384-0.096 0.096-0.224-0.032t-0.352-0.032q-0.032 0.096 0.064 0.288 0.064 0.16 0 0.32-0.224 0.128-0.352 0.32-0.16 0.16-0.256 0.448-0.064 0.384-0.096 0.544 0 0.16-0.032 0.64v0.64q-0.288-0.352-0.288-0.896 0-0.064 0.032-0.128 0.032-0.672 0.192-1.184t0.32-1.152q0.192-0.672 0.16-1.12 0.096-0.064 0.256-0.32 0.128-0.288 0.256-0.416-0.096-0.096-0.096-0.32 0.288-0.32 0.576-1.376 0.32-1.088 0.864-1.44v-0.64q0.128-0.032 0.416-0.352 0.032-0.16 0.064-0.48 0.064-0.288 0.064-0.448 0.032-0.16 0.096-0.352 0.096-0.192 0.192-0.32-0.224-0.352 0.256-1.12t0.256-1.152q0.256-0.128 0.416-0.416t0-0.512q0.288-0.288 0.544-0.864 0.224-0.544 0.544-0.896 0.128-0.128 0.096-0.512-0.032-0.32 0-0.512 0.032-0.096 0.224-0.288 0.224-0.16 0.288-0.288 0.064-0.192 0.064-0.512 0-0.384 0.096-0.576l0.192-0.128q0.192-0.096 0.352-0.288t0.128-0.352h0.416q0.448-1.344 1.184-1.696 0.064-0.928 0.832-1.888 0.704-0.992 0.864-1.568 0.672-0.384 1.696-1.536 1.024-1.216 1.76-1.568 0.032-0.032 0.096-0.16 0.096-0.128 0.128-0.16 0.032-0.064 0.128-0.16 0.064-0.096 0.128-0.128l0.16-0.16q0.096-0.064 0.192-0.096v-0.384q0.704-0.192 1.696-1.12 0.032 0 0.032 0.032 0 0.16-0.416 0.48-0.256 0.224-0.48 0.256-0.16 0.16-0.576 0.8t-0.928 0.8q-0.128 0.16-0.096 0.384-0.384 0.032-0.736 0.544-0.032 0.128 0.032 0.256t0.032 0.256z">
                                    </path>
                                </svg></div> Stat
                            <div
                                class="block w-16 h-16 bg-{{ $faction->bg_color }} text-white rounded-full text-center mx-auto align-middle table-cell text-5xl text-bold border-2 border-gray-900 average font-mono">
                                {{ $statistics['averageMeleeStat'] }}
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="inline-block mx-auto text-sm font-bold text-center">
                            <div class="icon baseline" id="gun" style="margin-right: -5px;">
                                <svg width="32" height="32" viewBox="0 0 32 32">
                                    <path id="icon-info"
                                        d="M5.824 11.328q0.032-0.192 0.128-0.224 0.128-0.064 0.192 0.032t0.096 0.192q1.92 0.288 1.632-1.632 1.856 0.384 4.992 0.448t5.696-0.096q2.56-0.128 4.16-0.352v3.296h-8.64q-0.352 0.032-0.544 0.192-0.192 0.192-0.256 0.544-0.064 0.288-0.064 0.64v0.8q0.032 0.448 0.032 0.704-0.544 0-1.024 0.16-0.48 0.192-0.672 0.352t-0.48 0.064-0.704-0.576q-0.32 0.096-0.64 0.928-0.192 0.768 0.224 0.736-0.448 0.928-0.832-0.16-0.352-1.024-0.384-1.088-1.344 0.32-1.824 0.992-0.48 0.64-0.448 1.824 0.032 1.12 0.192 2.912-0.832 0.096-1.44 0.128h-0.96q-0.32-0.032-1.088-0.064t-1.472-0.064q0.064-1.056 0.224-2.016t0.544-2.080q0.416-1.12 0.608-1.568 0.16-0.48 0.768-1.792 0.64-1.344 0.736-1.568 1.952 0.096 2.496-0.416-0.352-0.896-1.248-1.248z">
                                    </path>
                                </svg>
                            </div> Range
                        <div class="block w-16 h-16 bg-{{ $faction->bg_color }} text-white rounded-full text-center mx-auto align-middle @if ($statistics['averageGunRange']> 9) pt-3 text-3xl @else
                                text-5xl p-2 @endif text-bold border-2 border-gray-900 average font-mono">
                                {{ $statistics['averageGunRange'] }}
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="inline-block mx-auto text-sm font-bold text-center">
                            <div class="icon baseline" id="gun" style="margin-right: -5px;">
                                <svg width="32" height="32" viewBox="0 0 32 32">
                                    <path id="icon-info"
                                        d="M5.824 11.328q0.032-0.192 0.128-0.224 0.128-0.064 0.192 0.032t0.096 0.192q1.92 0.288 1.632-1.632 1.856 0.384 4.992 0.448t5.696-0.096q2.56-0.128 4.16-0.352v3.296h-8.64q-0.352 0.032-0.544 0.192-0.192 0.192-0.256 0.544-0.064 0.288-0.064 0.64v0.8q0.032 0.448 0.032 0.704-0.544 0-1.024 0.16-0.48 0.192-0.672 0.352t-0.48 0.064-0.704-0.576q-0.32 0.096-0.64 0.928-0.192 0.768 0.224 0.736-0.448 0.928-0.832-0.16-0.352-1.024-0.384-1.088-1.344 0.32-1.824 0.992-0.48 0.64-0.448 1.824 0.032 1.12 0.192 2.912-0.832 0.096-1.44 0.128h-0.96q-0.32-0.032-1.088-0.064t-1.472-0.064q0.064-1.056 0.224-2.016t0.544-2.080q0.416-1.12 0.608-1.568 0.16-0.48 0.768-1.792 0.64-1.344 0.736-1.568 1.952 0.096 2.496-0.416-0.352-0.896-1.248-1.248z">
                                    </path>
                                </svg>
                            </div> Stat
                            <div
                                class="block w-16 h-16 bg-{{ $faction->bg_color }} text-white rounded-full text-center mx-auto align-middle table-cell text-5xl text-bold border-2 border-gray-900 average font-mono">
                                {{ $statistics['averageGunStat'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-5 mb-2 text-lg text-center">
                <div class="block w-full py-2 text-center">
                    <span
                        class="text-transparent lg:text-4xl text-3xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                        Totals
                    </span>
                </div>
                <span class="block text-lg font-semibold">Unique Characters:
                    {{ $statistics['uniqueCharacters'] }}</span>
                <span class="block text-lg font-semibold">Total Models: {{ $statistics['totalCharacters'] }}</span>
                <span class="block text-lg font-semibold">Masters: {{ count($masters) }}</span>
                <span class="block text-lg font-semibold">Henchmen: {{ count($henchmen) }}</span>
                <span class="block text-lg font-semibold">Enforcers: {{ count($enforcers) }}</span>
                <span class="block text-lg font-semibold">Minions: {{ count($minions) }}</span>


            </div>
        </div>

        <div>
            <div class="mb-2 bg-gray-200 border-2 border-black rounded">
                <div
                    class="block p-1 mb-2 text-xl font-medium text-white align-middle border-b border-black bg-{{ $faction->bg_color }}">
                    Top 10 Abilities
                </div>
                <div class="mx-2 mb-2 text-lg">
                    @for ($i = 0; $i < count($topAbilities); $i++)
                        <div class="pl-4 mb-1" style="text-indent: -1rem;"><span class="font-bold">
                                {!! fauxdown($topAbilities[$i]['name']) !!}</span> ({{ $topAbilities[$i]['count'] }}
                            characters) - {!! fauxdown($topAbilities[$i]['description']) !!} </div>
                    @endfor
                </div>
            </div>
        </div>

    </div>

    <div class="block my-3 border-b border-gray-400 border-dashed"></div>

    <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto my-3 lg:grid-cols-2 auto-cols-fr">
        <div class="mb-2 text-center lg:col-span-2">
            <div class="block w-full h-full py-2 text-center">
                <span
                    class="text-transparent lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                    Resources
                </span>
            </div>
        </div>
        <div>
            <div class="mb-2">
                <div class="block w-full h-full py-2 text-center">
                    <span
                        class="text-transparent lg:text-4xl text-3xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                        Tactica
                    </span>
                </div>
                @if (!$faction->tactica)
                    <span class="block italic text-center">No tactica has been submitted yet for this faction! Contact
                        us today to submit
                        one.</span>
                @else
                    {!! $faction->tactica !!}
                @endif
            </div>
        </div>
        <div>
            <div class="block w-full h-full py-2 text-center">
                <span
                    class="text-transparent lg:text-4xl text-3xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                    Media
                </span>
                @foreach ($faction->episodes as $episode)
                    <a href="{{ $episode->link }}" class="block p-1 mb-2 hover:underline"
                        target="_{{ $faction->slug }}">
                        <div class="inline-block bg-gray-900 rounded-full">
                            {!! $episode->type->icon !!}
                        </div>
                        {{ $episode->name }} ({{ $episode->resource->name }})
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="block my-3 border-b border-gray-400 border-dashed"></div>

    <div class="container grid grid-cols-1 mx-auto lg:grid-cols-2">
        <div class="mb-2 text-center lg:col-span-2">
            <div class="block w-full h-full py-2 text-center">
                <span
                    class="text-transparent lg:text-4xl text-2xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                    Image Filters
                </span>
            </div>
        </div>
        <div class="my-4 text-center">
            <select name="keywords" wire:model="keyword" wire:change="filterKeywordDropdown()"
                class="block p-2 px-4 py-2 mx-auto bg-gray-200 border border-gray-900 rounded shadow w-60 hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value=''>Keywords</option>
                @foreach ($keywords as $aKeyword => $count)
                    <option value="{{ $aKeyword }}">{{ $aKeyword }}</option>
                @endforeach
            </select>
            @if ($keyword)
                <span class="inline-block p-2 mx-auto font-bold cursor-pointer" wire:click="clearFilters('keyword')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="inline-block"
                        style="height: 25px; width: 25px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path
                                d="M256 16C123.45 16 16 123.45 16 256s107.45 240 240 240 240-107.45 240-240S388.55 16 256 16zm0 60c99.41 0 180 80.59 180 180s-80.59 180-180 180S76 355.41 76 256 156.59 76 256 76zm-80.625 60c-.97-.005-2.006.112-3.063.313v-.032c-18.297 3.436-45.264 34.743-33.375 46.626l73.157 73.125-73.156 73.126c-14.63 14.625 29.275 58.534 43.906 43.906L256 299.906l73.156 73.156c14.63 14.628 58.537-29.28 43.906-43.906l-73.156-73.125 73.156-73.124c14.63-14.625-29.275-58.5-43.906-43.875L256 212.157l-73.156-73.125c-2.06-2.046-4.56-3.015-7.47-3.03z"
                                fill="#000000" fill-opacity="1"
                                transform="translate(25.6, 25.6) scale(0.9, 0.9) rotate(0, 256, 256) skewX(0) skewY(0)">
                            </path>
                        </g>
                    </svg> Clear
                </span>
            @endif
        </div>
        <div class="my-4 text-center">
            <select name="characteristic" wire:model="characteristic" wire:change="filterCharacteristicDropdown()"
                class="block p-2 px-4 py-2 mx-auto leading-loose bg-gray-200 border border-gray-900 rounded shadow w-60 hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value=''>Characteristics</option>
                @foreach ($characteristics as $aCharacteristic => $count)
                    <option value="{{ $aCharacteristic }}">{{ $aCharacteristic }}</option>
                @endforeach
            </select>
            @if ($characteristic)
                <span class="inline-block p-2 mx-auto font-bold cursor-pointer"
                    wire:click="clearFilters('characteristic')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="inline-block"
                        style="height: 25px; width: 25px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path
                                d="M256 16C123.45 16 16 123.45 16 256s107.45 240 240 240 240-107.45 240-240S388.55 16 256 16zm0 60c99.41 0 180 80.59 180 180s-80.59 180-180 180S76 355.41 76 256 156.59 76 256 76zm-80.625 60c-.97-.005-2.006.112-3.063.313v-.032c-18.297 3.436-45.264 34.743-33.375 46.626l73.157 73.125-73.156 73.126c-14.63 14.625 29.275 58.534 43.906 43.906L256 299.906l73.156 73.156c14.63 14.628 58.537-29.28 43.906-43.906l-73.156-73.125 73.156-73.124c14.63-14.625-29.275-58.5-43.906-43.875L256 212.157l-73.156-73.125c-2.06-2.046-4.56-3.015-7.47-3.03z"
                                fill="#000000" fill-opacity="1"
                                transform="translate(25.6, 25.6) scale(0.9, 0.9) rotate(0, 256, 256) skewX(0) skewY(0)">
                            </path>
                        </g>
                    </svg> Clear
                </span>
            @endif
        </div>
    </div>

    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    @if (count($masters) > 0)
        <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-4 auto-cols-fr">
            <div class="mx-auto lg:col-span-4">
                <div class="inline-block h-full py-2 mx-auto text-center" wire:click="masterToggle">
                    <span
                        class="text-transparent block cursor-pointer lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                        Masters
                    </span>
                    <span class="text-xs">
                        @if ($showMasters)
                            [Click to Close]

                        @else
                            [Click to Expand]
                        @endif
                    </span>
                </div>
            </div>
            @if ($showMasters)
                @foreach ($masters as $mini)
                    <div class="p-2">
                        <a href="{{ route('master.view', $mini->slug) }}" class="active:outline-none">
                            <img src="\storage\{{ $mini->cards->random()->front }}"
                                class="mx-auto rounded-lg card__image"></a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    @endif

    @if (count($henchmen) > 0)
        <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-4 auto-cols-fr">
            <div class="mx-auto lg:col-span-4">
                <div class="inline-block h-full py-2 mx-auto text-center" wire:click="henchmenToggle">
                    <span
                        class="text-transparent cursor-pointer block lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                        Henchmen
                    </span>
                    <span class="text-xs">
                        @if ($showHenchmen)
                            [Click to Close]

                        @else
                            [Click to Expand]
                        @endif
                    </span>
                </div>
            </div>
            @if ($showHenchmen)
                @foreach ($henchmen as $mini)
                    <div class="p-2">
                        <a href="{{ route('character.view', $mini->slug) }}" class="active:outline-none">
                            <img src="\storage\{{ $mini->cards->random()->front }}"
                                class="mx-auto rounded-lg card__image"></a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    @endif


    @if (count($enforcers) > 0)
        <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-4 auto-cols-fr">
            <div class="mx-auto lg:col-span-4">
                <div class="inline-block h-full py-2 mx-auto text-center" wire:click="enforcerToggle">
                    <span
                        class="text-transparent cursor-pointer block lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                        Enforcers
                    </span>
                    <span class="text-xs">
                        @if ($showEnforcers)
                            [Click to Close]

                        @else
                            [Click to Expand]
                        @endif
                    </span>
                </div>
            </div>
            @if ($showEnforcers)
                @foreach ($enforcers as $mini)
                    <div class="p-2">
                        <a href="{{ route('character.view', $mini->slug) }}" class="active:outline-none">
                            <img src="\storage\{{ $mini->cards->random()->front }}"
                                class="mx-auto rounded-lg card__image"></a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    @endif
    @if (count($minions) > 0)
        <div class="container grid w-full grid-cols-1 gap-0 px-2 mx-auto mt-3 lg:grid-cols-4 auto-cols-fr">
            <div class="mx-auto lg:col-span-4">
                <div class="inline-block h-full py-2 mx-auto text-center" wire:click="minionToggle">
                    <span
                        class="text-transparent cursor-pointer block lg:text-6xl text-4xl bg-clip-text bg-gradient-to-br from-{{ $faction->bg_color }} via-gray-700 to-{{ $faction->bg_color }} faction_header">
                        Minions
                    </span>
                    <span class="text-xs">
                        @if ($showMinions)
                            [Click to Close]

                        @else
                            [Click to Expand]
                        @endif
                    </span>
                </div>
            </div>
            @if ($showMinions)
                @foreach ($minions as $mini)
                    <div class="p-2">
                        <a href="{{ route('character.view', $mini->slug) }}" class="active:outline-none">
                            <img src="\storage\{{ $mini->cards->random()->front }}"
                                class="mx-auto rounded-lg card__image"></a>
                    </div>
                @endforeach
            @endif
        </div>
    @endif

</div>
