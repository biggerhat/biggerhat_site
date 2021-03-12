@extends('main')

@section('title')
    - Characters
@endsection

@section('content')
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-6xl text-gray-900 lg:text-8xl md:text-7xl faction_header">
                Characters
            </span>
        </div>
    </div>
    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    <div class="container mx-auto mb-2 text-center">
        <span class="block w-full text-4xl text-transparent text-gray-900 lg:text-6xl faction_header">
            Factions
        </span>
    </div>
    <div class="container grid w-full grid-cols-8 gap-0 px-2 pb-6 mx-auto lg:px-0 lg:gap-16">
        @foreach ($factions as $headerFaction)
            <div><a href="{{ route('faction.view', $headerFaction->slug) }}" class="active:outline-none"><img
                        src="\storage\{{ $headerFaction->image }}" alt="{{ $headerFaction->name }}"></a></div>
        @endforeach
    </div>

    <div class="container grid gap-0 mx-auto lg:grid-cols-3 auto-cols-fr lg:gap-2">
        <div class="block px-2 mb-2 text-center lg:px-0">
            <div class="block w-full p-2 border-2 border-gray-900 rounded active:outline-none"
                href="{{ route('keywords') }}">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-3xl text-transparent text-gray-900 lg:text-4xl faction_header">
                        Keywords
                    </span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="mx-auto"
                    style="height: 100px; width: 100px;">
                    <g class="" transform="translate(0,0)" style="">
                        <path
                            d="M82.875 19.125c-33.954 0-62.5 31.494-62.5 71.844 0 40.348 28.545 71.84 62.5 71.843 28.553 0 53.19-22.276 60.406-53.5l1.657-7.25h133.594v61.313h22.564V134.5h24.78v28.875h47.845v-16.5h-23.064V117.97h23.063V102.06h30.967v-26.28H144.125l-1.906-6.813c-8.274-29.326-31.934-49.845-59.345-49.845zm0 24.063c22.423 0 40.594 21.41 40.594 47.812 0 26.403-18.174 47.78-40.595 47.78-22.42 0-40.594-21.377-40.594-47.78 0-26.403 18.172-47.813 40.595-47.813zm44.25 138.53c-33.954 0-62.5 31.495-62.5 71.845 0 40.35 28.545 71.84 62.5 71.843 28.553 0 53.16-22.276 60.375-53.5l1.688-7.25H322.78v36.814h26.69v24.5h23.967V278.31h24.782v47.657h19.75v-61.314h30.936v-26.28h-260.53l-1.907-6.814c-8.274-29.324-31.934-49.843-59.345-49.843zm-23.03 49.47c.366-.02.752 0 1.124 0 11.905 0 21.53 9.625 21.53 21.53 0 11.907-9.625 21.563-21.53 21.563-11.907 0-21.564-9.655-21.564-21.56 0-11.535 9.047-20.955 20.438-21.532zM182 352.063l-51.844 28.593v81.125l51.47 27.47 56.468-55.375 2.72-2.688H374.28V448.75h40.533v24.78H374.28v19h119.126v-38h-34.812v-24.78h34.812v-24.844H241.062l-2.656-2.375L182 352.064zm-19.22 53.312c8.26 0 14.97 6.68 14.97 14.938 0 8.257-6.71 14.968-14.97 14.968-8.256 0-14.936-6.71-14.936-14.967 0-8.258 6.68-14.938 14.937-14.938z"
                            fill="#000000" fill-opacity="1"
                            transform="translate(25.6, 25.6) scale(0.9, 0.9) rotate(0, 256, 256) skewX(0) skewY(0)"></path>
                    </g>
                </svg>
                <div class="block italic">
                    Keywords are a vital part of the crew hiring process. Depending on which Master or Henchman you select
                    as your Leader, you can hire any characters that share any Keywords with them regardless of their
                    faction for no extra cost. Anything hired outside of Keyword that does not have the Versatile
                    characteristic costs +1 extra soulstone.
                </div>
                <button
                    class="px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                    href="{{ route('keywords') }}">View Keywords</button>
            </div>
        </div>
        <div class="block px-2 mb-2 text-center lg:px-0">
            <div class="block w-full p-2 border-2 border-gray-900 rounded active:outline-none"
                href="{{ route('keywords') }}">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-3xl text-transparent text-gray-900 lg:text-4xl faction_header">
                        Masters
                    </span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="mx-auto"
                    style="height: 100px; width: 100px;">
                    <g class="" transform="translate(0,0)" style="">
                        <path
                            d="M257.408 22.127l-23.082 62.035-31.017-57.707-11.542 59.15-44.002-55.543L154.26 110c27.263 27.263 178.638 27.663 206.3 0l5.772-79.936-44.002 55.543-11.54-59.15-31.02 56.986-22.36-61.313h-.002zm.45 129.094c-18.725 0-36.08 9.108-49.06 25.696-12.977 16.588-21.023 40.493-21.023 66.578 0 27.678 9.47 52.137 23.946 68.914l10.512 11.682-15.185 3.504c-40.28 9.177-59.512 28.283-70.666 57.818-10.383 27.496-12.014 65.42-12.263 110.38H393.35c-.047-45.15-.35-84.062-9.928-112.134-10.28-30.13-29.122-49.348-72.418-57.816l-15.186-2.92 9.928-12.266c13.574-16.684 22.193-40.46 22.193-67.162 0-26.085-8.048-49.99-21.026-66.578s-30.332-25.695-49.057-25.695z"
                            fill="#000000" fill-opacity="1"
                            transform="translate(25.6, 25.6) scale(0.9, 0.9) rotate(0, 256, 256) skewX(0) skewY(0)"></path>
                    </g>
                </svg>
                <div class="block italic">

                </div>
                <div class="block py-2">
                    <a class="px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                        href="{{ route('masters') }}">View Masters</a>
                </div>
            </div>
        </div>
        <div class="block px-2 mb-2 text-center lg:px-0">
            <div class="block w-full p-2 border-2 border-gray-900 rounded active:outline-none"
                href="{{ route('keywords') }}">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-3xl text-transparent text-gray-900 lg:text-4xl faction_header">
                        Upgrades
                    </span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 100px; width: 100px;"
                    class="mx-auto">
                    <g class="" transform="translate(0,0)" style="">
                        <path
                            d="M256 47L139.4 202.467l93.6-40.115V359h46V162.352l93.6 40.115L256 47zM144 256L32 480h448L368 256h-71v121h-82V256h-71z"
                            fill="#000000" fill-opacity="1"
                            transform="translate(25.6, 25.6) scale(0.9, 0.9) rotate(0, 256, 256) skewX(0) skewY(0)"></path>
                    </g>
                </svg>
                <div class="block italic">
                    "Upgrade Cards represent special options for your Crew. This could be specialized spells prepared just
                    for the battle, unique or rare equipment, or special tactics."
                    <br />-Malifaux Rules Manual

                </div>
                <button
                    class="px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                    href="{{ route('upgrades') }}">View Upgrades</button>
            </div>
        </div>
        <div class="block px-2 mb-2 text-center lg:px-0">
            <div class="block w-full p-2 border-2 border-gray-900 rounded active:outline-none"
                href="{{ route('keywords') }}">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-3xl text-transparent text-gray-900 lg:text-4xl faction_header">
                        Alts & Promos
                    </span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 100px; width: 100px;"
                    class="inline-block">
                    <g class="" transform="translate(0,0)" style="">
                        <path
                            d="M250.322 18.494c-25.06 3.26-47.158 32.267-47.158 69.346 0 20.453 7.06 38.57 17.502 51.166l10.123 12.213-15.59 2.932c-13.676 2.574-23.794 9.896-32.272 21.547-8.48 11.65-14.86 27.7-19.326 46.095-8.23 33.9-9.916 75.216-10.143 111.275h44.007l11.883 159.512h96.37l10.514-159.512h41.88c-.013-36.448-.353-78.316-7.81-112.48-4.042-18.524-10.176-34.575-18.777-46.12-8.6-11.543-19.21-18.81-34.482-21.18l-15.912-2.468 10.037-12.59c9.99-12.533 16.7-30.436 16.7-50.392 0-39.537-24.776-69.268-52.352-69.268-2.915 0-4.754-.135-5.196-.078zm178.608 1.078c-31.872-.534-61.166 26.473-71.084 63.49-4.575 17.073-4.83 35.29-.817 51.108-10.96 1.307-20.99 5.173-29.772 10.996 5.563 3.58 10.537 7.906 14.906 12.814 7.998-4.296 16.716-6.28 27.084-5.492l15.816 1.2-6.615-14.415c-5.86-12.764-7.33-33.55-2.554-51.377 8.122-30.308 31.484-49.75 52.75-49.61 1.416.008 2.825.104 4.22.29l.01.002c.263.037 1.817.567 4.44 1.27 23.73 6.36 38.404 37.853 29.168 72.324-4.66 17.392-15.965 34.567-27.02 42.73l-12.954 9.565 14.73 6.502c13.063 5.765 20.835 13.86 25.885 24.348 5.05 10.487 7.12 23.674 6.846 38.674-.5 27.368-8.862 60.148-17.2 91.362l-36.864-9.88-51.232 153.712-42.69.11-1.23 18.69 57.402-.146 49.914-149.758 37.946 10.166 2.42-9.025c9.022-33.677 19.603-71.135 20.22-104.89.31-16.876-1.89-32.994-8.693-47.124-5.016-10.417-12.696-19.57-23.065-26.622 10.814-11.607 19.228-27.125 23.637-43.58 11.288-42.13-6.228-85.52-42.38-95.21l-.003-.003c-1.106-.296-3.297-1.274-6.81-1.744h-.008l-2.838-.38-.295.146c-1.09-.082-2.185-.226-3.27-.244zm-349.32.46c-4.49.056-9.02.665-13.538 1.876-.095.026-.327.068-.44.094l-.575-.574-5.76 2.377h-.002C27.32 36.99 13.11 77.635 23.69 117.12c4.574 17.073 13.46 32.977 24.845 44.67-9.328 6.978-16.34 15.908-21.053 25.99-6.507 13.924-8.973 29.83-9.11 46.6-.27 33.543 8.753 71.01 17.82 104.845l2.42 9.027 40.02-10.727 51.11 149.454 60.46.153-1.39-18.694-45.7-.116-52.446-153.37-38.73 10.378c-8.028-30.892-15.098-63.467-14.875-90.8.122-14.997 2.417-28.276 7.354-38.84 4.937-10.56 12.24-18.566 23.865-24.15l14.298-6.87-12.94-9.176c-11.456-8.122-23.12-25.39-27.896-43.215-8.66-32.315 3.867-62.596 24.653-71.188l.025-.01c.244-.1 1.86-.42 4.486-1.12h.002l.002-.003c2.966-.796 6.005-1.18 9.072-1.175 21.47.027 44.263 19.06 52.344 49.223 4.66 17.392 3.46 37.92-2.035 50.517l-6.436 14.76 16.01-1.734c13.355-1.447 23.684 1.234 32.868 7.016 4.285-4.866 9.108-9.17 14.46-12.742-.73-.536-1.464-1.062-2.212-1.572-9.55-6.512-20.777-10.598-33.283-11.522 3.562-15.46 3.09-33.105-1.318-49.56-9.878-36.864-39.338-63.538-70.77-63.14z"
                            fill="#000000" fill-opacity="1"></path>
                    </g>
                </svg>
                <div class="block italic">
                    Many characters have alternate and special edition models that can only be obtained outside of their
                    normal boxes.
                </div>
                <button
                    class="px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                    href="{{ route('upgrades') }}">View Alts & Promos</button>
            </div>
        </div>

    </div>

@endsection
