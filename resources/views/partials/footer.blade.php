<footer class="py-3 bg-gray-700 border-t border-gray-700">
    <div class="container grid w-full grid-cols-8 gap-0 px-2 mx-auto lg:px-0 lg:gap-16">
        @foreach ($footerFactions as $footerFaction)
            <div><a href="{{ route('faction.view', $footerFaction->slug) }}" class="active:outline-none"><img
                        src="\storage\{{ $footerFaction->image }}" alt="{{ $footerFaction->name }}"></a></div>
        @endforeach
    </div>
    <div class="container grid grid-cols-1 gap-3 mx-auto mt-3 lg:grid-cols-10 auto-cols-auto">
        <div class="w-full mx-auto">
            <div
                class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-full">
                Characters</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="{{ route('advanced') }}"
                        class="hover:text-white hover:underline">Advanced Search</a>
                </li>
                <li class="text-sm"><a href="/random" class="hover:text-white hover:underline">Random Character</a></li>
                <li class="text-sm"><a href="{{ route('masters') }}"
                        class="hover:text-white hover:underline">Masters</a></li>
                <li class="text-sm"><a href="/keywords" class="hover:text-white hover:underline">Keywords</a></li>
                <li class="text-sm"><a href="/upgrades" class="hover:text-white hover:underline">Upgrades</a></li>
                <li class="text-sm"><a href="/promos" class="hover:text-white hover:underline">Alts & Promos</a></li>
            </ul>
        </div>
        <div class="w-full mx-auto">
            <div
                class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-auto">
                References</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="{{ route('faqs') }}" class="hover:text-white hover:underline">FAQs</a>
                </li>
                <li class="text-sm"><a href="{{ route('markers') }}" class="hover:text-white hover:underline">Terrain
                        Markers</a></li>
                <li class="text-sm"><a href="{{ route('summons') }}" class="hover:text-white hover:underline">Summoning Charts</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Soulstones</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Crew Hiring</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Timing Charts</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Encounter Setup</a></li>
                <li class="text-sm"><a href="{{ route('schemes') }}" class="hover:text-white hover:underline">Schemes
                        & Strategies</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Conditions</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">General Actions</a></li>
            </ul>
        </div>
        <div class="w-full mx-auto">
            <div
                class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-auto">
                Resources</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                @foreach ($footerResourceTypes as $resourceType)
                    <li class="text-sm"><a href="{{ route('resourcetype.view', $resourceType->slug) }}"
                            class="hover:text-white hover:underline">{{ $resourceType->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <!--
        <div class="w-full mx-auto">
            <div
                class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-auto">
                Tools</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Game Generator</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Crew Builder</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Model Collection</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Model Gallery</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Game Logging</a></li>
            </ul>
        </div> -->
        <div class="w-full mx-auto">
            <div
                class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-auto">
                Account</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                @if (Auth::guest())
                    <li class="text-sm"><a href="/login" class="hover:text-white hover:underline">Login</a></li>
                    <li class="text-sm"><a href="/register" class="hover:text-white hover:underline">Register</a></li>
                @else
                    <li class="text-sm"><a href="/user/profile" class="hover:text-white hover:underline">Profile</a>
                    </li>
                    <li class="text-sm"><a href="/user/logout" class="hover:text-white hover:underline">Logout</a></li>

                @endif
            </ul>
        </div>
        <div class="w-full mx-auto">
            <div
                class="mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md w-28 lg:w-auto">
                Contact Us</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="{{ route('about') }}" class="hover:text-white hover:underline">About</a>
                </li>
                <li class="text-sm"><a href="https://www.patreon.com/biggerhat" target="_patreon"
                        class="hover:text-white hover:underline">Patreon</a></li>
                <li class="text-sm"><a href="https://discord.gg/AT236KeAWT" class="hover:text-white hover:underline"
                        target="discord">Discord Server</a></li>
                <li class="text-sm"><a href="https://www.youtube.com/channel/UC095wgLOM_nojBIdzVUtfWg"
                        class="hover:text-white hover:underline" target="youtube">YouTube</a></li>
                <li class="text-sm"><a href="https://www.facebook.com/biggerhat/"
                        class="hover:text-white hover:underline" target="facebook">Facebook</a></li>
                <li class="text-sm"><a href="https://www.reddit.com/user/Biggerhat"
                        class="hover:text-white hover:underline" target="reddit">Reddit</a></li>
            </ul>
        </div>
    </div>
    <div class="container mx-auto text-gray-400">
        <div class="block px-2 my-2 text-xs lg:px-0">
            Portions of the materials used are copyrighted works of <a href="https://www.wyrd-games.net/" target="_wyrd"
                class="hover:text-white hover:underline" alt="Wyrd Miniatures">Wyrd Miniatures, LLC</a>, in the United
            States of
            America and elsewhere. All rights reserved, Wyrd Miniatures, LLC. This material is not official and is not
            endorsed by Wyrd Miniatures, LLC.
        </div>
        <div class="block px-2 my-2 text-xs lg:px-0">
            All Icons are from <a href="https://game-icons.net" target="_gameicons"
                class="hover:text-white hover:underline" alt="Game-Icons.net">Game-Icons.net</a> and are property of
            their respective authors.
        </div>
        <div class="block px-2 my-2 text-xs lg:px-0">
            All other content &copy; 2020 BiggerHat. Designed and Built by <a
                href="https://themostexcellentandawesomeforumever-wyrd.com/profile/38964-hermit/" target="_hermit"
                class="hover:text-white hover:underline" alt="Hermit">Hermit</a> and <a
                href="https://themostexcellentandawesomeforumever-wyrd.com/profile/38926-beeray/" target="_beeray"
                class="hover:text-white hover:underline" alt="Beeray">Beeray</a>.
        </div>
    </div>
</footer>
