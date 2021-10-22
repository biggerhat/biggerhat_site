@section('title')
    - Promos - {{ $promos[$currentCard]->name }}
@endsection
<div>
    <div
        class="container grid mx-auto mb-3 auto-cols-fr xl:grid-cols-7 lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-1 gap-x-3">

        <div class="p-0 m-0 mb-3 md:col-span-2 lg:col-span-3 xl:col-span-4">
            @if ($promos->count() > 1)
                <div class="px-5 my-1">
                    <select name="cards" wire:model="currentCard"
                        class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow md:w-3/4 hover:border-gray-500 focus:outline-none focus:shadow-outline">
                        @for ($i = 0; $i < $promos->count(); $i++)
                            <option value="{{ $i }}">{{ $promos[$i]['name'] }} {{ $i + 1 }}</option>
                        @endfor
                    </select>
                </div>
            @endif
            <div class="min-h-0 m-0 mx-auto bg-gray-400 rounded-lg w-min md:hidden">
                <div class="mx-auto card__image">
                    <div class="w-full h-full card__image--front">
                        <img src="\storage\{{ $this->promos[$currentCard]['front'] }}"
                            class="w-full h-full border-2 border-black rounded-lg cursor-pointer" />
                    </div>
                    <div class="w-full h-full card__image--back">
                        <img src="\storage\{{ $this->promos[$currentCard]['back'] }}"
                            class="w-full h-full border-2 border-black rounded-lg cursor-pointer" />
                    </div>
                </div>
            </div>
            <div class="hidden min-h-0 m-0 mx-auto bg-gray-300 rounded-lg w-min md:block">
                <img src="\storage\{{ $this->promos[$currentCard]['combo'] }}"
                    class="w-full h-full border-2 border-black rounded-lg shadow-lg" />
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

        </div>

        <div class="mx-1 mb-3 sm:my-3 md:m-0 xl:col-span-3 lg:col-span-2 md:col-span-2">
            <div class="mb-2 bg-gray-200 border border-t-4 border-b-4 border-black rounded shadow-lg">
                <div
                    class="block p-1 mb-2 text-xl font-medium text-gray-100 border-b border-gray-900 {{ getBackground($promos[$currentCard]->mini) }}">
                    {{ $promos[$currentCard]->name }}</div>
                <div class="mb-2 ">
                    <p class="pb-1 pl-1 mb-1 font-semibold text-md">Original Character: <a
                            href="{{ route('character.view', $promos[$currentCard]->mini->slug) }}"
                            class="inline-block text-center p-0.5 text-gray-100 border border-black rounded-full {{ getBackground($promos[$currentCard]->mini) }} px-2 py-1 text-sm font-bold mr-3">{{ strtoupper($promos[$currentCard]->mini->name) }}</a>
                    </p>
                </div>
            </div>
            @if (count($promos[$currentCard]->boxes) > 0)
                <div class="mb-2 bg-gray-200 border border-t-4 border-b-4 border-black rounded shadow-lg">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white border-b border-black {{ getBackground($promos[$currentCard]->mini) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                            class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M37.727 25l78 78h280.546l78-78H37.727zM25 37.727v436.546l78-78V115.727l-78-78zm462 0l-78 78v280.546l78 78V37.727zM79.957 40a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM432 40.793a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM112 72a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm287.45 0a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm63.42 0a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM48 73.047a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM79.395 104a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm352.605.2a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM121 121v193.273l53.7-53.7L174.065 121H121zm71.064 0l.555 121.654 54.38-54.38V121h-54.936zM265 121v49.273L314.273 121H265zm74.727 0L121 339.727V391h51.273L391 172.273V121h-51.273zM391 197.727l-53.023 53.023V391H391V197.727zm-71.023 71.023L265 323.727V391h54.977V268.75zM247 341.727L197.727 391H247v-49.273zM77.97 392a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm354.03.658a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM115.727 409l-78 78h436.546l-78-78H115.727zM48 423.752a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm64 .8a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm288 .712a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm64 4.74a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zM432 456a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8zm-352 2.56a8 8 0 0 1 8 8 8 8 0 0 1-8 8 8 8 0 0 1-8-8 8 8 0 0 1 8-8z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>Boxes
                    </div>
                    <div class="mx-2 mb-2">
                        @foreach ($promos[$currentCard]->boxes as $box)
                            <a href="{{ route('box.view', $box->slug) }}">
                                <img src="/storage/{{ $box->front }}"
                                    class="w-1/2 mx-auto border border-gray-500 rounded h-1/2"></a>
                        @endforeach
                    </div>
                </div>
            @endif
            @if (count($promos[$currentCard]->instructions) > 0)
                <div class="mb-2 bg-gray-200 border border-t-4 border-b-4 border-black rounded shadow-lg">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white border-b border-black {{ getBackground($promos[$currentCard]->mini) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                            class="inline-block">
                            <g class="" transform=" translate(0,0)" style="">
                                <path
                                    d="M241.406 21l-15.22 34.75c-7.864.478-15.703 1.472-23.467 2.97l-23.282-30.064-25.094 8.532-.125 38.25c-10.63 5.464-20.817 12.07-30.44 19.78L88.313 79.25 70.156 98.563 88.312 133c-5.852 8.346-10.925 17.072-15.218 26.094l-38.938 1.062-7.906 25.28 31.438 23.158c-1.505 9.38-2.24 18.858-2.282 28.344L20.5 254.625l3.656 26.25 38.313 7.5c2.284 7.982 5.107 15.826 8.5 23.5L45.72 343.22l14.093 22.436 39.25-9.187c2.47 2.895 5.037 5.757 7.718 8.53 5.643 5.835 11.565 11.206 17.72 16.125l-7.625 39.313 22.938 13.25 29.968-26.094c8.606 3.462 17.435 6.23 26.407 8.312l9.782 38.406 26.405 2.157 15.875-36.22c10.97-.66 21.904-2.3 32.656-4.938l25.22 29.22 24.593-9.844-.72-14.813-57.406-43.53c-16.712 4.225-34.042 5.356-51.063 3.436-31.754-3.58-62.27-17.92-86.218-42.686-54.738-56.614-53.173-146.67 3.438-201.406 27.42-26.513 62.69-39.963 98-40.344 37.59-.406 75.214 13.996 103.438 43.187 45.935 47.512 52.196 118.985 19.562 173.095l31.97 24.25c3.997-6.28 7.594-12.75 10.75-19.375l38.655-1.063 7.906-25.28-31.217-23c1.513-9.457 2.262-19.035 2.28-28.594l34.688-17.625-3.655-26.25-38.28-7.5c-3.196-10.993-7.444-21.762-12.75-32.125l22.81-31.594-15.25-21.657-37.56 10.906c-.472-.5-.93-1.007-1.408-1.5-5.998-6.205-12.33-11.89-18.937-17.064l7.188-37.125L334 43.78l-28.5 24.814c-9.226-3.713-18.702-6.603-28.313-8.75l-9.343-36.688L241.406 21zM183.25 174.5c-10.344.118-20.597 2.658-30 7.28l45.22 34.314c13.676 10.376 17.555 30.095 7.06 43.937-10.498 13.85-30.656 15.932-44.53 5.408l-45.188-34.282c-4.627 24.793 4.135 51.063 25.594 67.344 19.245 14.597 43.944 17.33 65.22 9.688l4.78-1.72 4.03 3.063 135.19 102.564 4.03 3.062-.344 5.063c-1.637 22.55 7.59 45.61 26.844 60.217 21.46 16.28 49.145 17.63 71.78 6.5l-45.186-34.28c-13.874-10.526-17.282-30.506-6.78-44.344 10.5-13.84 30.537-15.405 44.217-5.032l45.188 34.283c4.616-24.784-4.11-51.067-25.563-67.344-19.313-14.658-43.817-17.562-64.968-10.033l-4.75 1.688-4.03-3.063-135.19-102.562-4.03-3.063.344-5.03c1.55-22.387-7.85-45.194-27.157-59.845-12.544-9.516-27.222-13.978-41.78-13.812zm43.563 90.25l163.875 124.344L379.406 404 215.5 279.625l11.313-14.875z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>Blueprints
                    </div>
                    <div class="mx-2 mb-2">
                        @foreach ($promos[$currentCard]->instructions as $instruction)
                            <a href="{{ route('instruction.view', [$instruction->id, $mini->slug]) }}"><img
                                    src="/storage/{{ $instruction->image }}"
                                    class="mx-auto mb-2 border border-gray-500 rounded"></a>
                        @endforeach
                    </div>
                </div>
            @endif




        </div>


    </div>
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
