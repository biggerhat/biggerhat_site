@section('title')
    - {{ $mini->name }}
@endsection
<div class="">
    @if (count($mini->Spoilers) > 0)
        <div class="container mx-auto">
            <div class="w-full p-5 mx-auto bg-red-100 rounded sm:w-1/2">
                <div class="flex space-x-3">
                    <div class="flex flex-col space-y-2 leading-tight">
                        <div class="text-sm font-medium text-red-700">WARNING</div>
                        <div class="flex-1 text-sm leading-snug text-red-600">This character is a spoiler and not
                            officially released yet. It is subject to change upon official release.
                        </div>
                        <div class="flex-1 text-sm leading-snug text-red-600">Check out the source for this Spoiler
                            here: <a href="{{ $mini->Spoilers[0]->url }}" target="_new"
                                     class="font-bold hover:underline">{{ $mini->Spoilers[0]->name }}
                                ({{ $mini->Spoilers[0]->source }})</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div
        class="container grid mx-auto auto-cols-fr xl:grid-cols-7 lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-1 gap-x-3">

        <div class="p-0 m-0 mb-3 md:col-span-2 lg:col-span-3 xl:col-span-4">
            @if ($cardCount + count($mini->promos) > 1)
                <div class="px-5 my-1">
                    <select name="cards" wire:model="currentCard"
                            class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow md:w-3/4 hover:border-gray-500 focus:outline-none focus:shadow-outline">
                        @for ($i = 0; $i < $cardCount; $i++)
                            <option value="{{ $i }}">{{ $cards[$i]['name'] }}</option>
                        @endfor
                        @if (count($mini->promos) > 0)
                            @for ($x = $i; $x < count($mini->promos) + $cardCount; $x++)
                                <option value="{{ $x }}">{{ $cards[$x]['name'] }} (Alt/Promo)</option>
                            @endfor
                        @endif
                    </select>
                </div>
            @endif
            <div class="min-h-0 m-0 mx-auto bg-gray-400 rounded-lg w-min md:hidden">
                <div class="mx-auto card__image">
                    <div class="w-full h-full card__image--front">
                        <img src="\storage\{{ $this->cards[$currentCard]['front'] }}"
                             class="w-full h-full border-2 border-black rounded-lg cursor-pointer"/>
                    </div>
                    <div class="w-full h-full card__image--back">
                        <img src="\storage\{{ $this->cards[$currentCard]['back'] }}"
                             class="w-full h-full border-2 border-black rounded-lg cursor-pointer"/>
                    </div>
                </div>
            </div>
            <div class="hidden min-h-0 m-0 mx-auto bg-gray-300 rounded-lg w-min md:block">
                <img src="\storage\{{ $this->cards[$currentCard]['combo'] }}"
                     class="w-full h-full border-2 border-black rounded-lg shadow-lg"/>
            </div>
            <div
                class="w-12 px-2 py-2 mx-auto mt-2 text-xs font-medium leading-6 text-center text-gray-900 transition bg-transparent border-2 border-black rounded-full shadow md:hidden flipper ripple hover:shadow-lg hover:bg-gray-100 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 25px; width: 25px;"
                     class="mx-auto">
                    <g class="" transform=" translate(0,0)" style="">
                        <path
                            d="M258.148 20.822c-1.112.008-2.226.026-3.343.055-39.32 1.041-81.507 15.972-123.785 50.404l-6.028 4.91-5.732-5.25c-12.644-11.578-20.276-27.633-25.653-43.716-8.974 36.98-14.631 81.385-9.232 114.523 18.065.908 45.409-2.177 73.7-7.818 17.858-3.561 36.048-8.126 53.064-13.072-13.419-2.911-25.896-6.882-38.143-12.082l-16.088-6.832 14.906-9.127c46.367-28.393 80.964-40.686 120.235-35.553 33.105 4.327 69.357 20.867 119.066 47.271-25.373-36.314-62.243-64.737-104.728-76.994-15.402-4.443-31.553-6.828-48.239-6.719zM346 116c-46.667 0-46.666 0-46.666 46.666V349.4c0 9.596.007 17.19.414 23.242a664.804 664.804 0 0 1 50.656-12.223c24.649-4.915 48.367-8.224 67.916-8.41 6.517-.062 12.571.224 18.041.912l6.31.793 1.358 6.213c2.464 11.265 3.673 23.447 3.914 36.059 38.032-.19 38.057-3.06 38.057-46.65V162.665C486 116 486 116 439.334 116a226.98 226.98 0 0 1 3.978 7.64l12.624 25.536-25.004-13.648c-13.085-7.143-25.164-13.632-36.452-19.528zm-281.943.016c-38.032.19-38.057 3.06-38.057 46.65V349.4C26 396 26 396 72.666 396a226.98 226.98 0 0 1-3.978-7.64l-12.624-25.536 25.004 13.649c13.085 7.142 25.164 13.632 36.452 19.527H166c46.667 0 46.666 0 46.666-46.666V162.666c0-9.626-.006-17.24-.416-23.304a664.811 664.811 0 0 1-50.654 12.22c-32.865 6.554-64.077 10.25-85.957 7.498l-6.31-.793-1.358-6.213c-2.464-11.265-3.673-23.446-3.914-36.058zm354.619 254.078c-17.543.25-40.826 3.206-64.75 7.977-17.859 3.56-36.05 8.125-53.065 13.072 13.419 2.91 25.896 6.881 38.143 12.082l16.088 6.832-14.906 9.127c-46.367 28.392-80.964 40.685-120.235 35.553-33.105-4.327-69.357-20.868-119.066-47.272 25.373 36.315 62.243 64.738 104.728 76.994 52.573 15.166 113.872 6.343 175.367-43.74l6.028-4.91 5.732 5.25c12.644 11.579 20.276 27.633 25.653 43.717 8.974-36.981 14.631-81.386 9.232-114.524-2.788-.14-5.748-.204-8.95-.158z"
                            fill="#000000" fill-opacity="1"></path>
                    </g>
                </svg>
            </div>
            @if ($this->cards[$currentCard]['type'] == 'promo')
                <div class="flex flex-col p-2 ">
                    <div class="w-full p-5 bg-blue-100 border-l-4 border-blue-500 rounded">
                        <div class="flex space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 class="flex-none w-4 h-4 text-blue-500 fill-current">
                                <path
                                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z"/>
                            </svg>
                            <div class="flex-1 text-sm leading-tight text-blue-700">
                                This is a promotional or alternate sculpt for this character. Check out more info <a
                                    href="{{ route('promo.view', $this->cards[$currentCard]['slug']) }}"
                                    class="font-bold hover:underline">Here</a>.
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @can('edit', $mini)
                @if (count($mini->Spoilers) > 0)
                    <div class="p-2 text-center align-middle">
                        <button
                            class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                            wire:click="removeSpoiler">
                            Remove Spoiler
                        </button>
                    </div>
                @else
                    <div class="p-2 text-center align-middle">
                        <button
                            class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                            wire:click="openSpoilerModal">
                            Make Spoiler
                        </button>
                    </div>
                @endif
            @endcan
        </div>

        <div class="xl:col-span-3 lg:col-span-2 md:col-span-2 overflow-auto px-1 md:px-0">
            <div class="bg-gray-200 border border-t-4 border-b-4 border-black rounded shadow-lg">
                <div
                    class="block p-1 text-xl font-medium text-gray-100 border-b mb-2 border-gray-900 {{ $background }}">
                    {{ $mini->name }}</div>
                <div class="">
                    @if ($original)
                        <p class="pb-1 pl-1 font-semibold text-md">Title for:
                            <a href="{{ route('character.view', $original->slug) }}"
                               class="inline-block text-center p-0.5 text-white border border-black rounded-full {{ getBackground($original) }} px-2 py-1 text-sm font-bold">{{ strtoupper($original->name) }}</a>
                        </p>
                        <div class="block my-1 border-b border-gray-400 border-dashed"></div>
                    @endif
                    <p class="pb-1 pl-1 font-semibold text-md">Station: <a
                            href="/advanced?station={{ $mini->station->id }}"
                            class="inline-block text-center p-0.5 text-gray-100 border border-black rounded-full {{ $background }} px-2 py-1 text-sm font-bold mr-3">{{ strtoupper($mini->station->name) }}</a>
                    </p>
                    <div class="block my-1 border-b border-gray-400 border-dashed"></div>
                    <p class="pb-1 pl-1 font-semibold text-md">Faction(s): @foreach ($mini->factions as $faction)<a
                            href="/factions/{{ $faction->slug }}"
                            class="inline-block text-center p-0.5 text-gray-100 border border-black rounded-full bg-{{ $faction->bg_color }} px-2 py-1 text-sm font-bold">{{ strtoupper($faction->name) }}</a>
                        @endforeach</p>
                    <div class="block my-1 border-b border-gray-400 border-dashed"></div>
                    <p class="pb-1 pl-1 font-semibold text-md">Keyword(s): @foreach ($mini->keywords as $keyword)<a
                            href="{{ route('keyword.view', $keyword->slug) }}"
                            class="inline-block text-center p-0.5 text-gray-100 border border-black rounded-full {{ $background }} px-2 py-1 text-sm font-bold ">{{ strtoupper($keyword->name) }}</a>
                        @endforeach</p>
                    <div class="block my-1 border-b border-gray-400 border-dashed"></div>
                    <p class="pb-1 pl-1 font-semibold text-md">
                        Characteristic(s): @foreach ($mini->characteristics as $characteristic)<a
                            href="/advanced?characteristic={{ $characteristic->name }}"
                            class="inline-block text-center p-0.5 text-white border border-black rounded-full {{ $background }} px-2 py-1 text-sm font-bold">{{ strtoupper($characteristic->name) }}</a>
                        @endforeach</p>
                </div>
            </div>
            <br />
            @if ($mini->titles->count() > 0)
                <div class="bg-gray-200 border border-t-4 border-b-4 border-black rounded shadow-lg">
                    <div
                        class="block text-xl font-medium pl-1 text-gray-100 border-b border-gray-900 {{ $background }}">
                        Titles
                    </div>
                    <div class="p-2">
                        @foreach($mini->titles as $title)
                            <a href="{{ route('character.view', $title->slug) }}"
                               class="inline-block text-center p-0.5 text-white border border-black rounded-full {{ getBackground($title) }} px-2 py-1 text-sm font-bold">{{ strtoupper($title->name) }}</a>
                        @endforeach
                    </div>
                </div>
                <br />
            @endif


            @if (count($mini->erratas) > 0)
                <div class="bg-gray-200 border border-t-4 border-b-4 border-black rounded shadow-lg">
                    <div
                        class="block p-1 text-xl font-medium text-white border-b border-black {{ $background }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                             class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M168.8 32.89l-32.6 32.53 21.3 21.17L190 54.08zm33.9 33.96l-9.9 9.91 123 123.04 9.9-9.9zm159.4 18.06c-3.7 0-7.4.1-10.9.3-31.9 1.78-56.7 11.76-78.3 26.39l65.5 65.6c3.5 7.3 52 96.2 65.5 123.3-9.7-6.4-123.4-65.4-123.4-65.4l-15.3-15.2v140.3c23.9-14.6 50.1-27.7 83.6-31.2 37.5-4 83.5 4.3 144.2 33.1V118.7c-51.7-22.99-93.3-32.89-127.2-33.69-1.3 0-2.5-.11-3.7-.1zm-230.8 1.03C100.4 88.93 63.44 99 19.05 118.7v243.4C79.85 333.3 125.8 325 163.3 329c33 5.2 58.1 15.8 83.6 31.2V201.6c-38.6-38.5-77.1-77.1-115.6-115.66zm48.8 3.55l-9.9 9.89 123 123.02 9.9-9.9zM336 205.1l-27.5 27.5 55.1 27.6zM143.8 346.7c-32 .3-71.85 9.8-124.75 36v42.5c60.8-28.8 106.75-37.1 144.25-33.1 18.6 2 34.9 6.9 49.8 13.3-4.7 6.1-9.3 13.3-13.9 21.7h117.2c-6-8.2-11.8-15.4-17.7-21.6 15-6.5 31.4-11.4 50.1-13.4 37.5-4 83.5 4.3 144.2 33.1v-42.5c-53.1-26.3-93.1-35.9-125.2-36h-3.1c-4.8.1-9.4.4-13.9.9-34 3.6-59.6 18-85.6 34.4-5.7-.8-13-1.8-18.3-.9-27.2-16.2-58.2-30.4-85.5-33.5-5.6-.6-11.5-.9-17.6-.9z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>
                        Errata History
                    </div>
                    <div class="mx-2">
                        @foreach ($mini->erratas as $errata)
                            {!! nl2br(fauxdown($errata->description)) !!}
                            <span class="block italic text-right">-{{ $errata->season->name }}</span>
                            @if (!$loop->last)
                                <div class="block my-3 border-b border-gray-500 border-dashed"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <br />
            @endif

            @if ($areQuestions)
                <div class="bg-gray-200 border border-t-4 border-b-4 border-black rounded shadow-lg">
                    <div
                        class="block p-1 text-xl font-medium text-white border-b border-black {{ $background }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                             class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M255.76 44.764c-6.176 0-12.353 1.384-17.137 4.152L85.87 137.276c-9.57 5.536-9.57 14.29 0 19.826l152.753 88.36c9.57 5.536 24.703 5.536 34.272 0l152.753-88.36c9.57-5.535 9.57-14.29 0-19.825l-152.753-88.36c-4.785-2.77-10.96-4.153-17.135-4.153zm-.824 53.11c9.013.097 17.117 2.162 24.31 6.192 4.92 2.758 8.143 5.903 9.666 9.438 1.473 3.507 1.56 8.13.26 13.865l-1.6 5.706c-1.06 4.083-1.28 7.02-.66 8.81.57 1.764 1.983 3.278 4.242 4.544l3.39 1.898-33.235 18.62-3.693-2.067c-4.118-2.306-6.744-4.912-7.883-7.82-1.188-2.935-.99-7.603.594-14.005l1.524-5.748c.887-3.423.973-6.23.26-8.418-.653-2.224-2.134-3.983-4.444-5.277-3.515-1.97-7.726-2.676-12.63-2.123-4.956.526-10.072 2.268-15.35 5.225-4.972 2.785-9.487 6.272-13.55 10.46-4.112 4.162-7.64 8.924-10.587 14.288L171.9 138.21c5.318-5.34 10.543-10.01 15.676-14.013 5.134-4 10.554-7.6 16.262-10.8 14.976-8.39 28.903-13.38 41.78-14.967 3.208-.404 6.315-.59 9.32-.557zm50.757 56.7l26.815 15.024-33.235 18.62-26.816-15.023 33.236-18.62zM75.67 173.84c-5.753-.155-9.664 4.336-9.664 12.28v157.696c0 11.052 7.57 24.163 17.14 29.69l146.93 84.848c9.57 5.526 17.14 1.156 17.14-9.895V290.76c0-11.052-7.57-24.16-17.14-29.688l-146.93-84.847c-2.69-1.555-5.225-2.327-7.476-2.387zm360.773.002c-2.25.06-4.783.83-7.474 2.385l-146.935 84.847c-9.57 5.527-17.14 18.638-17.14 29.69v157.7c0 11.05 7.57 15.418 17.14 9.89L428.97 373.51c9.57-5.527 17.137-18.636 17.137-29.688v-157.7c0-7.942-3.91-12.432-9.664-12.278zm-321.545 63.752c6.553 1.366 12.538 3.038 17.954 5.013 5.415 1.976 10.643 4.417 15.68 7.325 13.213 7.63 23.286 16.324 30.218 26.082 6.932 9.7 10.398 20.046 10.398 31.04 0 5.64-1.055 10.094-3.168 13.364-2.112 3.212-5.714 5.91-10.804 8.094l-5.2 1.92c-3.682 1.442-6.093 2.928-7.23 4.46-1.137 1.472-1.705 3.502-1.705 6.092v3.885l-29.325-16.933v-4.23c0-4.72.892-8.376 2.68-10.97 1.787-2.652 5.552-5.14 11.292-7.467l5.2-2.006c3.087-1.21 5.334-2.732 6.742-4.567 1.46-1.803 2.192-4.028 2.192-6.676 0-4.027-1.3-7.915-3.9-11.66-2.6-3.804-6.227-7.05-10.885-9.74-4.387-2.532-9.126-4.29-14.217-5.272-5.09-1.04-10.398-1.254-15.922-.645v-27.11zm269.54 8.607c1.522 0 2.932.165 4.232.493 6.932 1.696 10.398 8.04 10.398 19.034 0 5.64-1.056 11.314-3.168 17.023-2.112 5.65-5.714 12.507-10.804 20.568l-5.2 7.924c-3.682 5.695-6.093 9.963-7.23 12.807-1.137 2.785-1.705 5.473-1.705 8.063v3.885l-29.325 16.932v-4.23c0-4.72.894-9.41 2.68-14.067 1.79-4.715 5.552-11.55 11.292-20.504l5.2-8.01c3.087-4.776 5.334-8.894 6.742-12.354 1.46-3.492 2.192-6.562 2.192-9.21 0-4.028-1.3-6.414-3.898-7.158-2.6-.8-6.23.142-10.887 2.83-4.387 2.533-9.124 6.25-14.215 11.145-5.09 4.84-10.398 10.752-15.922 17.74v-27.11c6.553-6.2 12.536-11.44 17.95-15.718 5.417-4.278 10.645-7.87 15.68-10.777 10.738-6.2 19.4-9.302 25.99-9.307zm-252.723 94.515l29.326 16.93v30.736l-29.325-16.93v-30.735zm239.246 8.06v30.735l-29.325 16.93v-30.733l29.326-16.932z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>
                        FAQs
                    </div>
                    <div class="mx-2">
                        @foreach ($questions as $question)
                            <span class="font-bold">Q.</span> {!! fauxdown($question['question']) !!} <br/>
                            <span class="font-bold">A.</span> {!! fauxdown($question['answer']) !!} <br/>
                            @if (!$loop->last)
                                <div class="block my-3 border-b border-gray-500 border-dashed"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <br />
            @endif
        </div>
    </div>

    <div class="block border-b border-gray-500 border-dashed"></div>
        <br />

    <div class="container grid mx-auto auto-cols-fr lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-x-2">

        <div class="mx-1 mb-2 sm:my-2">
            <div class="bg-gray-200 border-2 border-black rounded">
                <div
                    class="block p-1 mb-2 text-xl font-medium text-white align-middle border-b border-black {{ $background }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                         class="inline-block">
                        <g class="" transform=" translate(0,0)" style="">
                            <path
                                d="M369.1 21.22c-19.2 0-36.2 10.63-47.9 26.47-11.7 15.84-18.6 37.03-18.6 60.31 0 21.1 5.7 40.5 15.5 55.7-5.7 1.6-11 3.9-15.9 6.6-10.2-8.5-22.6-13.6-35.9-13.6-19.3 0-36.3 10.6-48 26.4-4.7 6.4-8.6 13.6-11.6 21.5-4.8-2.4-9.9-4.3-15.5-5.6 9.4-15.1 14.8-34.1 14.8-54.7 0-23.2-6.9-44.43-18.6-60.27-11.7-15.84-28.7-26.5-47.9-26.5s-36.2 10.66-47.94 26.5C79.87 99.87 73 121.1 73 144.3c0 21.1 5.69 40.5 15.47 55.8-32.07 9.1-50.29 37.1-59.44 70-9.79 35.2-10.87 77.3-10.87 115.6v9.4h45.5l6.78 99.3h18.75l-7.28-106.5-4.1-80-18.65 1 3.47 67.5H36.97c.24-35.2 1.97-72.1 10.09-101.2 8.78-31.6 23.32-52.8 51.25-58.2l4.69-.1c10.3 8.8 22.9 14.2 36.5 14.2 14.1 0 26.9-5.7 37.4-15h4.6c7.8 1.2 14.4 3.5 20.1 6.7-1.2 6.6-1.9 13.5-1.9 20.6 0 21.1 5.7 40.5 15.5 55.8-32.1 9.1-50.3 37.2-59.4 70-9.8 35.2-10.9 77.3-10.9 115.6v9.4c21.7-.3 42.8.2 64.3.2l-.5-7.3-4.1-80-18.7.9 3.4 67.5h-25.6c.3-35.2 2-72.1 10.1-101.2 8.7-31.6 23.3-52.7 51.1-58.2l4.9-.1c10.3 8.8 22.8 14.2 36.4 14.2 14.1 0 27-5.7 37.5-15h4.4c15.4 2.4 26.1 8.9 34.5 18.6 8.5 9.7 14.5 23.2 18.5 39.2 7.3 29.5 7.7 66.9 7.7 102.5h-23.4l3.5-67.5-18.7-.9-4.2 82-.3 5.3c20.8 0 43.3-.3 61.9-.2v-9.4c0-38.1.5-80.6-8.4-116.3-4.4-17.8-11.3-34.1-22.4-47-9.7-11.1-22.7-19.4-38.8-23.4 9.4-15.1 14.7-34.1 14.7-54.7 0-22.5-6.4-43.2-17.5-58.8 3.9-1.8 8.1-3.1 12.7-4h4.7c10.3 8.8 22.9 14.2 36.5 14.2 14.1 0 27-5.8 37.4-15l4.6-.1c15.4 2.5 26 8.9 34.4 18.6 8.5 9.8 14.5 23.3 18.5 39.3 7.3 29.4 7.7 66.8 7.7 102.4h-23.4l3.5-67.4-18.7-1-4.1 79.7-8.6 143.1h18.7l8.2-135.7h43.1v-9.3c0-38.2.6-80.7-8.3-116.3-4.5-17.9-11.4-34.2-22.5-47-9.6-11.2-22.6-19.5-38.8-23.5 9.4-15.1 14.8-34 14.8-54.6 0-23.28-6.9-44.47-18.6-60.31-11.6-15.29-31.5-26.13-47.9-26.47zm0 18.69c12.4 0 23.9 6.69 32.9 18.87 9 12.19 14.9 29.67 14.9 49.22 0 19.5-5.9 37-14.9 49.2-9 12.2-20.5 18.9-32.9 18.9-12.3 0-23.9-6.7-32.9-18.9s-14.9-29.7-14.9-49.2c0-19.55 5.9-37.03 14.9-49.22 9-12.18 20.6-18.87 32.9-18.87zM139.5 76.22c12.4 0 23.9 6.72 32.9 18.9s14.9 29.68 14.9 49.18-5.9 37-14.9 49.2c-9 12.2-20.5 18.9-32.9 18.9-12.4 0-23.9-6.7-32.9-18.9-8.97-12.2-14.91-29.7-14.91-49.2 0-19.5 5.94-37 14.91-49.17 9-12.19 20.5-18.91 32.9-18.91zm197.8 22.34v18.64h22.5V98.56h-22.5zm41.1 0v18.64h22.5V98.56h-22.5zM107.7 134.9v18.7h22.5v-18.7h-22.5zm41.1 0v18.7h22.5v-18.7h-22.5zm117.5 40.4c12.3 0 23.8 6.7 32.8 18.9 9 12.2 15 29.7 15 49.2 0 19.6-6 37-15 49.2-9 12.2-20.5 18.9-32.8 18.9-12.4 0-24-6.7-33-18.9-8.9-12.2-14.9-29.6-14.9-49.2 0-19.5 6-37 14.9-49.2 9-12.2 20.6-18.9 33-18.9zM234.5 234v18.7h22.4V234zm41.1 0v18.7H298V234h-22.4z"
                                fill="#ffffff" fill-opacity="1"></path>
                        </g>
                    </svg>
                    Related Characters
                </div>
                <div class="mx-2 mb-2">
                    @foreach ($relateds as $relatedMini)
                        <a href="{{ route('character.view', $relatedMini->slug) }}"
                           class="inline-block text-center border border-black p-0.5 text-white rounded-full @if (count($relatedMini->factions) > 1) bg-gradient-to-r
                            from-{{ $relatedMini->factions[0]['bg_color'] }}
                               to-{{ $relatedMini->factions[1]['bg_color'] }} @else
                               bg-{{ $relatedMini->factions[0]['bg_color'] }} @endif px-2 py-1
                            font-bold mb-1 cursor-pointer">{{ strtoupper($relatedMini->name) }}</a><br/>
                    @endforeach
                </div>
            </div>
        </div>

        @if (count($mini->upgrades) > 0)
            <div class="mx-1 mb-2 sm:my-2">
                <div class="bg-gray-200 border-2 border-black rounded">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white border-b border-black {{ $background }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                             class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M256 47L139.4 202.467l93.6-40.115V359h46V162.352l93.6 40.115L256 47zM144 256L32 480h448L368 256h-71v121h-82V256h-71z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>
                        Related Upgrades
                    </div>
                    <div class="mx-2 mb-2">
                        @foreach ($mini->upgrades as $upgrade)
                            <button wire:click="openUpgradeModal({{ $upgrade->id }})"
                                    class="inline-block text-center p-0.5 border border-black text-white rounded-full focus:outline-none {{ getUpgradeBackground($upgrade) }} px-2 py-1 font-bold mb-1">{{ strtoupper($upgrade->name) }}</button>
                            <br/>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($mini->boxes) > 0)
            <div class="mx-1 mb-2 sm:my-2">
                <div class="bg-gray-200 border-2 border-black rounded">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white border-b border-black {{ $background }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                             class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M37.727 25l78 78h280.546l78-78H37.727zM25 37.727v436.546l78-78V115.727l-78-78zm462 0l-78 78v280.546l78 78V37.727zM79.957 40a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM432 40.793a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM112 72a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm287.45 0a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm63.42 0a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM48 73.047a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM79.395 104a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm352.605.2a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM121 121v193.273l53.7-53.7L174.065 121H121zm71.064 0l.555 121.654 54.38-54.38V121h-54.936zM265 121v49.273L314.273 121H265zm74.727 0L121 339.727V391h51.273L391 172.273V121h-51.273zM391 197.727l-53.023 53.023V391H391V197.727zm-71.023 71.023L265 323.727V391h54.977V268.75zM247 341.727L197.727 391H247v-49.273zM77.97 392a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm354.03.658a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM115.727 409l-78 78h436.546l-78-78H115.727zM48 423.752a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm64 .8a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm288 .712a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm64 4.74a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM432 456a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm-352 2.56a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>
                        Boxes
                    </div>
                    <div class="mx-2 mb-2">
                        @foreach ($mini->boxes as $box)
                            <a href="{{ route('box.view', $box->slug) }}">
                                <img src="/storage/{{ $box->front }}"
                                     class="w-1/2 mx-auto border border-gray-500 rounded h-1/2"></a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($mini->instructions) > 0)
            <div class="mx-1 mb-2 sm:my-2">
                <div class="bg-gray-200 border-2 border-black rounded">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white border-b border-black {{ $background }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                             class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M241.406 21l-15.22 34.75c-7.864.478-15.703 1.472-23.467 2.97l-23.282-30.064-25.094 8.532-.125 38.25c-10.63 5.464-20.817 12.07-30.44 19.78L88.313 79.25 70.156 98.563 88.312 133c-5.852 8.346-10.925 17.072-15.218 26.094l-38.938 1.062-7.906 25.28 31.438 23.158c-1.505 9.38-2.24 18.858-2.282 28.344L20.5 254.625l3.656 26.25 38.313 7.5c2.284 7.982 5.107 15.826 8.5 23.5L45.72 343.22l14.093 22.436 39.25-9.187c2.47 2.895 5.037 5.757 7.718 8.53 5.643 5.835 11.565 11.206 17.72 16.125l-7.625 39.313 22.938 13.25 29.968-26.094c8.606 3.462 17.435 6.23 26.407 8.312l9.782 38.406 26.405 2.157 15.875-36.22c10.97-.66 21.904-2.3 32.656-4.938l25.22 29.22 24.593-9.844-.72-14.813-57.406-43.53c-16.712 4.225-34.042 5.356-51.063 3.436-31.754-3.58-62.27-17.92-86.218-42.686-54.738-56.614-53.173-146.67 3.438-201.406 27.42-26.513 62.69-39.963 98-40.344 37.59-.406 75.214 13.996 103.438 43.187 45.935 47.512 52.196 118.985 19.562 173.095l31.97 24.25c3.997-6.28 7.594-12.75 10.75-19.375l38.655-1.063 7.906-25.28-31.217-23c1.513-9.457 2.262-19.035 2.28-28.594l34.688-17.625-3.655-26.25-38.28-7.5c-3.196-10.993-7.444-21.762-12.75-32.125l22.81-31.594-15.25-21.657-37.56 10.906c-.472-.5-.93-1.007-1.408-1.5-5.998-6.205-12.33-11.89-18.937-17.064l7.188-37.125L334 43.78l-28.5 24.814c-9.226-3.713-18.702-6.603-28.313-8.75l-9.343-36.688L241.406 21zM183.25 174.5c-10.344.118-20.597 2.658-30 7.28l45.22 34.314c13.676 10.376 17.555 30.095 7.06 43.937-10.498 13.85-30.656 15.932-44.53 5.408l-45.188-34.282c-4.627 24.793 4.135 51.063 25.594 67.344 19.245 14.597 43.944 17.33 65.22 9.688l4.78-1.72 4.03 3.063 135.19 102.564 4.03 3.062-.344 5.063c-1.637 22.55 7.59 45.61 26.844 60.217 21.46 16.28 49.145 17.63 71.78 6.5l-45.186-34.28c-13.874-10.526-17.282-30.506-6.78-44.344 10.5-13.84 30.537-15.405 44.217-5.032l45.188 34.283c4.616-24.784-4.11-51.067-25.563-67.344-19.313-14.658-43.817-17.562-64.968-10.033l-4.75 1.688-4.03-3.063-135.19-102.562-4.03-3.063.344-5.03c1.55-22.387-7.85-45.194-27.157-59.845-12.544-9.516-27.222-13.978-41.78-13.812zm43.563 90.25l163.875 124.344L379.406 404 215.5 279.625l11.313-14.875z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>
                        Blueprints
                    </div>
                    <div class="mx-2 mb-2">
                        @foreach ($mini->instructions as $instruction)
                            <a href="{{ route('instruction.view', [$instruction->id, $mini->slug]) }}"><img
                                    src="/storage/{{ $instruction->image }}"
                                    class="mx-auto mb-2 border border-gray-500 rounded"></a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($mini->summoner) > 0)
            <div class="mx-1 mb-2 sm:my-2">
                <div class="bg-gray-200 border-2 border-black rounded">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white border-b border-black {{ $background }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                             class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M254.885 21.08c-31.185 0-58.496 32.517-58.496 75.092 0 42.575 27.31 75.09 58.495 75.09 31.186 0 58.498-32.515 58.498-75.09S286.07 21.08 254.885 21.08zm-32.262 52.078h18.69v45.723h-18.69V73.16zm43.803 0h18.69v45.723h-18.69V73.16zm43.943 88.28c-13.86 17.468-33.346 28.51-55.485 28.51-21.33 0-40.192-10.257-53.938-26.626-11.126 4.16-20.024 11.688-27.67 22.285-9.668 13.403-16.88 31.75-21.923 52.71-4.735 19.677-7.546 41.513-9.202 63.61 7.876 4.015 14.466 9.84 19.61 16.782 6.746 9.102 11.316 19.966 14.56 31.75 3.395-11.403 7.95-21.896 14.324-30.75 5.08-7.054 11.502-13.04 19.155-17.183-4.61-9.605-7.21-20.688-7.21-32.29 0-34.46 22.86-64.393 53.572-64.393 30.713 0 53.572 29.934 53.572 64.392 0 10.913-2.3 21.368-6.408 30.565 8.922 4.012 16.312 10.29 21.96 17.91 6.942 9.368 11.577 20.603 14.837 32.784 3.426-11.803 8.064-22.662 14.633-31.785 4.46-6.194 9.956-11.564 16.41-15.587-1.083-23.328-3.275-46.454-7.752-67.144-4.568-21.113-11.505-39.48-21.326-52.777-8.29-11.223-18.313-18.974-31.72-22.764zM89.95 224.532c-16.32 0-31.497 15.67-34.386 37.99H79.81v18.687H56.083c3.874 20.57 18.353 34.73 33.867 34.73 15.513 0 29.992-14.16 33.866-34.73H98.5V262.52h25.834c-2.888-22.32-18.066-37.99-34.385-37.99zm166.212 0c-16.32 0-31.496 15.67-34.385 37.99h24.16v18.687h-23.642c2.92 15.51 11.873 27.37 22.75 32.27-6.347.482-12.23 1.242-17.117 2.2l-.028.007-.027.005c-9.335 1.772-16.13 6.7-22.06 14.937-5.93 8.236-10.528 19.833-13.745 33.25-5.746 23.972-7.066 53.275-7.297 79.29h23.503V392.12h18.69v103.025h61.906V392.12h18.687v51.048h21.91c-.044-26.343-.5-56.035-5.776-80.164-2.947-13.486-7.4-25.042-13.42-33.166-6.02-8.124-13.142-13.033-23.68-14.682l-.194-.03-.19-.038c-5.24-1.045-11.492-1.713-18.09-2.01 10.496-5.12 19.068-16.76 21.913-31.87h-25.403V262.52h25.92c-2.888-22.32-18.066-37.99-34.385-37.99zm165.992 0c-16.32 0-31.496 15.67-34.384 37.99h24.296v18.687h-23.78c3.875 20.57 18.354 34.73 33.868 34.73 15.514 0 29.993-14.16 33.867-34.73h-25.266V262.52h25.785c-2.89-22.32-18.066-37.99-34.386-37.99zm-294.564 91.6c-9.507 11.333-22.63 18.493-37.64 18.493-13.795 0-25.996-6.05-35.263-15.824-4.983 2.6-9.165 6.523-12.984 11.827-5.93 8.236-10.528 19.833-13.744 33.25-5.747 23.972-7.067 53.275-7.298 79.29h23.252V392.12h18.688v103.025h61.906V392.12h18.69v51.048h22.745c-.043-26.342-.5-56.035-5.775-80.164-2.948-13.486-7.4-25.042-13.422-33.166-5.115-6.902-11.032-11.474-19.156-13.707zm331.344 1.013c-9.432 10.746-22.22 17.48-36.78 17.48-14.395 0-27.065-6.574-36.465-17.11-6.246 2.505-11.26 6.852-15.768 13.114-5.93 8.236-10.528 19.833-13.744 33.25-5.747 23.972-7.066 53.275-7.297 79.29h22.927V392.12h18.69v103.025H452.4V392.12h18.688v51.048h22.498c-.018-26.37-.353-56.076-5.504-80.21-2.88-13.486-7.266-25.037-13.23-33.147-4.393-5.972-9.388-10.195-15.92-12.667z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>
                        Summoning Chart
                    </div>
                    <div class="mx-2 mb-2">
                        <a href="/summons?summoner={{ $mini->slug }}">
                            <img src="/storage/{{ $mini->summoner[0]->chart }}"
                                 class="w-1/2 mx-auto border border-gray-500 rounded h-1/2"></a>

                    </div>
                </div>
            </div>
        @endif

        @if ($areTokens)
            <div class="mx-1 mb-2 sm:my-2">
                <div class="bg-gray-200 border-2 border-black rounded">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white border-b border-black {{ $background }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                             class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M264.4 95.01c-35.6-.06-80.2 11.19-124.2 34.09C96.27 152 61.45 182 41.01 211.3c-20.45 29.2-25.98 56.4-15.92 75.8 10.07 19.3 35.53 30.4 71.22 30.4 35.69.1 80.29-11.2 124.19-34 44-22.9 78.8-53 99.2-82.2 20.5-29.2 25.9-56.4 15.9-75.8-10.1-19.3-35.5-30.49-71.2-30.49zm91.9 70.29c-3.5 15.3-11.1 31-21.8 46.3-22.6 32.3-59.5 63.8-105.7 87.8-46.2 24.1-93.1 36.2-132.5 36.2-18.6 0-35.84-2.8-50.37-8.7l10.59 20.4c10.08 19.4 35.47 30.5 71.18 30.5 35.7 0 80.3-11.2 124.2-34.1 44-22.8 78.8-52.9 99.2-82.2 20.4-29.2 26-56.4 15.9-75.7zm28.8 16.8c11.2 26.7 2.2 59.2-19.2 89.7-18.9 27.1-47.8 53.4-83.6 75.4 11.1 1.2 22.7 1.8 34.5 1.8 49.5 0 94.3-10.6 125.9-27.1 31.7-16.5 49.1-38.1 49.1-59.9 0-21.8-17.4-43.4-49.1-59.9-16.1-8.4-35.7-15.3-57.6-20zm106.7 124.8c-10.2 11.9-24.2 22.4-40.7 31-35 18.2-82.2 29.1-134.3 29.1-21.2 0-41.6-1.8-60.7-5.2-23.2 11.7-46.5 20.4-68.9 26.1 1.2.7 2.4 1.3 3.7 2 31.6 16.5 76.4 27.1 125.9 27.1s94.3-10.6 125.9-27.1c31.7-16.5 49.1-38.1 49.1-59.9z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>
                        Tokens & Markers
                    </div>
                    <div class="mx-2 mb-2">
                        @if ($this->mini->markers)
                            @foreach ($this->mini->markers as $token)
                                <button
                                    class="inline-block text-center p-0.5 text-white rounded-full bg-gray-900 px-2 py-1 font-bold mb-1 focus:outline-none"
                                    wire:click="openMarkerModal('{{ $token->id }}')">{{ strtoupper($token['name']) }}</button>
                                <br/>
                            @endforeach
                        @endif
                        @if ($this->mini->tokens)
                            @foreach ($this->mini->tokens as $token)
                                <span
                                    class="inline-block text-center p-0.5 text-white rounded-full bg-gray-900 px-2 py-1 font-bold mb-1 focus:outline-none">{{ strtoupper($token['name']) }}</span>
                                <br/>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @if (count($mini->episodes) > 0)
            <div class="mx-1 mb-2 sm:my-2">
                <div class="bg-gray-200 border-2 border-black rounded">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white border-b border-black {{ $background }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                             class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M251.828 15.982l-29.2 136.08-56.74-75.652 7.78 90.4-49.154-24.68 22.19 49.643-67.16-13.433 57.817 70.668-55.48-10.514 35.634 26.608c29.894.77 62.017-2.565 90.597 4.35 18.697 4.522 36.167 14.302 48.255 32.74.414.632.82 1.274 1.22 1.923.402-.65.806-1.29 1.22-1.922 12.088-18.44 29.558-28.22 48.254-32.742 27.64-6.685 58.596-3.782 87.643-4.28l35.25-26.676-42.05 8.178 41.468-80.596-59.507 19.852 19.092-77.352-57.234 59.867 6.055-109.607-46.232 97.31-39.715-140.164zM92.236 281.787L50.27 311.02l207.343 72.68L464.95 310.67l-40.99-28.88c-42.595 7.18-92.04-5.54-126.02 10.345l-.116.05-.013.008c-5.226 2.37-9.962 5.418-14.255 9.382-7.564 6.774-13.817 16.048-18.36 28.694l-7.777 13.763-7.158-12.67c-5.434-15.833-13.453-26.5-23.324-33.637-.157-.114-.316-.22-.473-.332-.63-.446-1.267-.883-1.912-1.302-33.565-21.772-86.63-6.6-132.314-14.3zm-64.26 41.3L21.81 340.73l190.67 66.674v17.817h91.55v-18.687h-.055L492.15 340.73l-6.168-17.642-205.658 71.918 4.03 11.527h-54.75l4.03-11.527-205.657-71.918z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>
                        Resources
                    </div>
                    <div class="mx-2 mb-2 font-semibold text-md">
                        @foreach ($mini->episodes as $episode)
                            <a href="{{ $episode->link }}" class="block mb-2 hover:underline"
                               target="_{{ $mini->slug }}">
                                <div class="inline-block bg-gray-900 rounded-full">
                                    {!! $episode->type->icon !!}
                                </div>
                                {{ $episode->name }} ({{ $episode->resource->name }})
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if ($upgradeModal)
        <div class="fixed top-0 left-0 w-full h-full bg-gray-500 opacity-75 z-100"></div>
        <div class="fixed top-0 left-0 w-full h-full overflow-y-auto z-101" wire:click.stop="closeUpgradeModal">
            <div class="table px-5 py-6 m-auto w-content" wire:click.stop="">
                <div class="table-cell text-center align-middle">
                    <div class="mx-2 bg-gray-200 border-2 border-black rounded md:mx-auto">
                        <div class="px-5 py-5 mx-auto text-sm card__image">
                            <img src="\storage\{{ $upgradeContent }}" class="w-full h-full rounded-lg"/>
                        </div>
                        <div class="p-2 text-center align-middle">
                            <a href="{{ route('upgrade.view', $upgradeSlug) }}"
                               class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                               wire:click="closeUpgradeModal">
                                View Page
                            </a>
                            <button
                                class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                                wire:click="closeUpgradeModal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($markerModal)
        <div class="fixed top-0 left-0 w-full h-full bg-gray-500 opacity-75 z-100"></div>
        <div class="fixed top-0 left-0 w-full h-full overflow-y-auto z-101" wire:click.stop="closeMarkerModal">
            <div class="table px-5 py-6 m-auto w-content" wire:click.stop="">
                <div class="table-cell text-center align-middle">
                    <div class="mx-2 bg-gray-200 border-2 border-black rounded md:mx-auto">
                        <div class="block p-1 mb-2 text-xl font-medium text-white bg-gray-900 border-b border-black">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                 style="height: 32px; width: 32px;" class="inline-block">
                                <g class="" transform=" translate(0,0)" style="">
                                    <path
                                        d="M264.4 95.01c-35.6-.06-80.2 11.19-124.2 34.09C96.27 152 61.45 182 41.01 211.3c-20.45 29.2-25.98 56.4-15.92 75.8 10.07 19.3 35.53 30.4 71.22 30.4 35.69.1 80.29-11.2 124.19-34 44-22.9 78.8-53 99.2-82.2 20.5-29.2 25.9-56.4 15.9-75.8-10.1-19.3-35.5-30.49-71.2-30.49zm91.9 70.29c-3.5 15.3-11.1 31-21.8 46.3-22.6 32.3-59.5 63.8-105.7 87.8-46.2 24.1-93.1 36.2-132.5 36.2-18.6 0-35.84-2.8-50.37-8.7l10.59 20.4c10.08 19.4 35.47 30.5 71.18 30.5 35.7 0 80.3-11.2 124.2-34.1 44-22.8 78.8-52.9 99.2-82.2 20.4-29.2 26-56.4 15.9-75.7zm28.8 16.8c11.2 26.7 2.2 59.2-19.2 89.7-18.9 27.1-47.8 53.4-83.6 75.4 11.1 1.2 22.7 1.8 34.5 1.8 49.5 0 94.3-10.6 125.9-27.1 31.7-16.5 49.1-38.1 49.1-59.9 0-21.8-17.4-43.4-49.1-59.9-16.1-8.4-35.7-15.3-57.6-20zm106.7 124.8c-10.2 11.9-24.2 22.4-40.7 31-35 18.2-82.2 29.1-134.3 29.1-21.2 0-41.6-1.8-60.7-5.2-23.2 11.7-46.5 20.4-68.9 26.1 1.2.7 2.4 1.3 3.7 2 31.6 16.5 76.4 27.1 125.9 27.1s94.3-10.6 125.9-27.1c31.7-16.5 49.1-38.1 49.1-59.9z"
                                        fill="#ffffff" fill-opacity="1"></path>
                                </g>
                            </svg>{{ $markerName }}
                        </div>
                        <div class="px-5 py-5 mx-auto text-md">
                            <div class="flex mx-auto bg-gray-900 rounded-full"
                                 style=" @if ($markerSize == 50) width: 188px; height: 188px; @endif


                                 @if ($markerSize==40)
                                     width:
                                     151px;
                                     height:
                                     151px;@endif @if ($markerSize == 30)width: 113px;
                                     height:113px;@endif">
                                {!! $markerIcon !!}
                            </div>
                            <span class="font-semibold">Size:</span> {{ $markerSize }}mm <br/>
                            <span class="font-semibold">Traits:</span> {!! fauxdown($markerContent) !!}
                        </div>
                        <div class="p-2 text-center align-middle">
                            <button
                                class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                                wire:click="closeMarkerModal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($spoilerModal)
        <div class="fixed top-0 left-0 w-full h-full bg-gray-500 opacity-75 z-100"></div>
        <div class="fixed top-0 left-0 w-full h-full overflow-y-auto z-101" wire:click.stop="closeSpoilerModal">
            <div class="table px-5 py-6 m-auto w-content" wire:click.stop="">
                <div class="table-cell text-center align-middle">
                    <div class="mx-2 bg-gray-200 border-2 border-black rounded md:mx-auto">
                        <div class="block p-1 mb-2 text-xl font-medium text-white bg-gray-900 border-b border-black">
                            Make Spoiler
                        </div>
                        <div class="px-5 py-5 mx-auto text-md">
                            <select name="cards" wire:model="spoilerID"
                                    class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                <option>Select A Spoiler Resource</option>
                                @foreach ($spoilers as $spoiler)
                                    <option value="{{ $spoiler['id'] }}">{{ $spoiler['name'] }}
                                        ({{ $spoiler['source'] }})
                                    </option>
                                @endforeach
                            </select>
                            <div class="p-2">
                                <button
                                    class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                                    wire:click="addSpoiler()">
                                    Add Spoiler
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>


@section('scripts')
    var flipper = document.querySelector('.flipper')
    var card = document.querySelector('.card__image');
    flipper.addEventListener( 'click', function() {
    card.classList.toggle('is-flipped');
    });
    card.addEventListener( 'click', function() {
    card.classList.toggle('is-flipped');
    });
@endsection
