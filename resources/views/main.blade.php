<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/custom.css">
    <title>BiggerHat.Net</title>
</head>

<body class="flex flex-col min-h-screen antialiased bg-gray-300">
<header>
    <nav class="px-5 bg-gray-900">
        <ul class="flex flex-wrap items-center justify-between font-sans list-none md:py-0 menu lg:flex-nowrap">
            <li class="py-4 my-auto text-xl logo"><a href="/" class="block text-white">Bigger Hat</a></li>
            <li class="flex w-1/2 my-auto lg:w-1/3">
                <div class="flex w-full h-full my-auto text-sm bg-gray-900 rounded-full">
                    @if(Request::path() != "/")
                        <input type="search" name="search" placeholder="Search" class="w-full h-10 px-2 my-auto text-sm bg-gray-200 rounded-l-full rounded-r-full focus:outline-none" autocomplete="off" />
                        <a class="block px-1 py-4" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 30px; width: 30px;" class="block m-auto"><g class="" transform="translate(0,0)" style=""><path d="M87 32v71h18V32H87zm160 0v345h18V32h-18zm160 0v167h18V32h-18zM50 121c-5.14 0-9 3.9-9 9v28c0 5.1 3.86 9 9 9h92c5.1 0 9-3.9 9-9v-28c0-5.1-3.9-9-9-9H50zm37 64v295h18V185H87zm283 32c-5.1 0-9 3.9-9 9v28c0 5.1 3.9 9 9 9h92c5.1 0 9-3.9 9-9v-28c0-5.1-3.9-9-9-9h-92zm37 64v199h18V281h-18zM210 395c-5.1 0-9 3.9-9 9v28c0 5.1 3.9 9 9 9h92c5.1 0 9-3.9 9-9v-28c0-5.1-3.9-9-9-9h-92zm37 64v21h18v-21h-18z" fill="#ffffff" fill-opacity="1" transform="translate(25.6, 25.6) scale(0.9, 0.9) rotate(0, 256, 256) skewX(0) skewY(0)"></path></g></svg></a>
                    @endif
                </div>
            </li>
            <li class="order-3 hidden w-full p-2 text-center item has-submenu lg:block lg:w-auto lg:relative">
                <a tabindex="0" class="block p-4 text-gray-200 rounded-lg cursor-pointer hover:text-white hover:bg-gray-700">Characters</a>
                <ul class="hidden p-2 list-none bg-gray-800 submenu min-w-max">
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Factions</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Keywords</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="se" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Upgrades</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Alts & Promos</a></li>
                </ul>
            </li>
            <li class="order-3 hidden w-full p-2 text-center item lg:block lg:w-auto lg:relative"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">References</a></li>
            <li class="order-3 hidden w-full p-2 text-center item has-submenu lg:block lg:w-auto lg:relative">
                <a tabindex="0" class="block p-4 text-gray-200 rounded-lg cursor-pointer hover:text-white hover:bg-gray-700">Resources</a>
                <ul class="hidden p-2 list-none bg-gray-800 submenu min-w-max">
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Keywords</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="se" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Upgrades</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Alts & Promos</a></li>
                </ul>
            </li>
            <li class="order-3 hidden w-full p-2 text-center item has-submenu lg:block lg:w-auto lg:relative">
                <a tabindex="0" class="block p-4 text-gray-200 rounded-lg cursor-pointer hover:text-white hover:bg-gray-700">Tools</a>
                <ul class="hidden p-2 list-none bg-gray-800 submenu min-w-max">
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Game Generator</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="se" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Crew Builder</a></li>
                </ul>
            </li>
            <li class="order-3 hidden w-full p-2 text-center item has-submenu lg:block lg:w-auto lg:relative">
                <a tabindex="0" class="block p-2 text-gray-200 rounded-lg cursor-pointer hover:text-white hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;" class="inline-block"><g class="" transform="translate(0,0)" style=""><path d="M119.1 25v.1c-25 3.2-47.1 32-47.1 68.8 0 20.4 7.1 38.4 17.5 50.9L99.7 157 84 159.9c-13.7 2.6-23.8 9.9-32.2 21.5-8.5 11.5-14.9 27.5-19.4 45.8-8.2 33.6-9.9 74.7-10.1 110.5h44l11.9 158.4h96.3L185 337.7h41.9c0-36.2-.3-77.8-7.8-111.7-4-18.5-10.2-34.4-18.7-45.9-8.6-11.4-19.2-18.7-34.5-21l-16-2.5L160 144c10-12.5 16.7-30.2 16.7-50.1 0-39.2-24.8-68.8-52.4-68.8-2.9 0-4.7-.1-5.2-.1zM440 33c-17.2 0-31 13.77-31 31s13.8 31 31 31 31-13.77 31-31-13.8-31-31-31zM311 55v48H208v18h103v158h-55v18h55v110H208v18h103v32h80.8c-.5-2.9-.8-5.9-.8-9 0-3.1.3-6.1.8-9H329V297h62.8c-.5-2.9-.8-5.9-.8-9 0-3.1.3-6.1.8-9H329V73h62.8c-.5-2.92-.8-5.93-.8-9 0-3.07.3-6.08.8-9H311zm129 202c-17.2 0-31 13.8-31 31s13.8 31 31 31 31-13.8 31-31-13.8-31-31-31zm0 160c-17.2 0-31 13.8-31 31s13.8 31 31 31 31-13.8 31-31-13.8-31-31-31z" fill="#ffffff" fill-opacity="1" transform="translate(25.6, 25.6) scale(0.9, 0.9) rotate(0, 256, 256) skewX(0) skewY(0)"></path></g></svg>
                    <span class="inline-block lg:hidden">Account</span>
                </a>
                <ul class="hidden p-2 list-none bg-gray-800 submenu min-w-max">
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Profile</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Game Logs</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Collection</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="#" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Gallery</a></li>
                    <li class="block rounded-lg cursor-pointer subitem hover:bg-gray-700"><a href="se" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Logout</a></li>
                </ul>
            </li>

            <!--toggle-->
            <li class="order-1 toggle lg:hidden md:visible">
                <a class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"><g class="" transform="translate(0,0)" style=""><path d="M32 96v64h448V96H32zm0 128v64h448v-64H32zm0 128v64h448v-64H32z" fill="#ffffff" fill-opacity="1"></path></g></svg>
                </a>
            </li>
        </ul>
    </nav>
</header>

<main class="flex-grow min-h-screen pt-5 pb-5">
    
    @yield('content')

    @fauxdown({{plus}})
    
</main>
<footer class="py-3 bg-gray-700 border-t border-gray-700">
    <div class="container grid w-full grid-cols-8 gap-0 px-2 mx-auto lg:px-0 lg:gap-16">
        @foreach($footerFactions as $footerFaction)
            <div><a href="./factions/{{$footerFaction->id}}/{{Str::slug($footerFaction->name,'-')}}"><img src=".\storage\{{$footerFaction->image}}" alt="{{$footerFaction->name}}"></a></div>
        @endforeach    
    </div>
    <div class="container grid grid-cols-1 gap-3 mx-auto mt-3 lg:grid-cols-10 auto-cols-auto">
        <div class="w-full mx-auto">
            <div class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-full">Characters</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Advanced Search</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Keywords</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Upgrades</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Alts & Promos</a></li>
            </ul>
        </div>
        <div class="w-full mx-auto">
            <div class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-auto">References</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Summoning Charts</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Soulstones</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Crew Hiring</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Timing Charts</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Encounter Setup</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Schemes & Strategies</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Conditions</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">General Actions</a></li>
            </ul>
        </div>
        <div class="w-full mx-auto">
            <div class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-auto">Resources</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Podcasts</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Blogs</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">YouTube</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Discussion Groups</a></li>
            </ul>
        </div>
        <div class="w-full mx-auto">
            <div class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-auto">Tools</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Game Generator</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Crew Builder</a></li>
            </ul>
        </div>
        <div class="w-full mx-auto">
            <div class="w-32 mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md lg:w-auto">Account</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Login</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Register</a></li>
            </ul>
        </div>
        <div class="w-full mx-auto">
            <div class="mx-auto font-semibold text-center text-gray-400 border-b border-gray-400 lg:text-left text-md w-28 lg:w-auto">Contact Us</div>
            <ul class="font-sans text-center text-gray-300 list-none lg:text-left">
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">About</a></li>
                <li class="text-sm"><a href="" class="hover:text-white hover:underline">Donate to Us</a></li>
                <li class="text-sm"><a href="https://www.facebook.com/biggerhat/" class="hover:text-white hover:underline">Facebook</a></li>
                <li class="text-sm"><a href="https://www.reddit.com/user/Biggerhat" class="hover:text-white hover:underline">Reddit</a></li>
            </ul>
        </div>
    </div>
    <div class="container mx-auto text-gray-400">
        <div class="block px-2 my-2 text-xs lg:px-0">
            Portions of the materials used are copyrighted works of <a href="https://www.wyrd-games.net/" target="_wyrd" class="hover:text-white hover:underline" alt="Wyrd Miniatures">Wyrd Miniatures, LLC</a>, in the United States of
            America and elsewhere. All rights reserved, Wyrd Miniatures, LLC. This material is not official and is not
            endorsed by Wyrd Miniatures, LLC.
        </div>
        <div class="block px-2 my-2 text-xs lg:px-0">
            All Icons are from <a href="https://game-icons.net" target="_gameicons" class="hover:text-white hover:underline" alt="Game-Icons.net">Game-Icons.net</a> and are property of their respective authors.
        </div>
        <div class="block px-2 my-2 text-xs lg:px-0">
            All other content &copy; 2020 BiggerHat. Designed and Built by <a href="https://themostexcellentandawesomeforumever-wyrd.com/profile/38964-hermit/" target="_hermit"  class="hover:text-white hover:underline" alt="Hermit">Hermit</a> and <a href="https://themostexcellentandawesomeforumever-wyrd.com/profile/38926-beeray/" target="_beeray" class="hover:text-white hover:underline" alt="Beeray">Beeray</a>.
        </div>
    </div>
</footer>

<script>
    @yield('scripts')

    const toggle = document.querySelector(".toggle");
    const menu = document.querySelector(".menu");
    const items = document.querySelectorAll(".item");

    /* Toggle mobile menu */
    function toggleMenu() {
        if (menu.classList.contains("active")) {
            menu.classList.remove("active");
            toggle.querySelector("a").innerHTML = "\n" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\" style=\"height: 32px; width: 32px;\"><g class=\"\" transform=\"translate(0,0)\" style=\"\"><path d=\"M32 96v64h448V96H32zm0 128v64h448v-64H32zm0 128v64h448v-64H32z\" fill=\"#ffffff\" fill-opacity=\"1\"></path></g></svg>";
        } else {
            menu.classList.add("active");
            toggle.querySelector("a").innerHTML = "\n" +
                "<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\" style=\"height: 32px; width: 32px;\"><g class=\"\" transform=\"translate(0,0)\" style=\"\"><path d=\"M256 16C123.45 16 16 123.45 16 256s107.45 240 240 240 240-107.45 240-240S388.55 16 256 16zm0 60c99.41 0 180 80.59 180 180s-80.59 180-180 180S76 355.41 76 256 156.59 76 256 76zm-80.625 60c-.97-.005-2.006.112-3.063.313v-.032c-18.297 3.436-45.264 34.743-33.375 46.626l73.157 73.125-73.156 73.126c-14.63 14.625 29.275 58.534 43.906 43.906L256 299.906l73.156 73.156c14.63 14.628 58.537-29.28 43.906-43.906l-73.156-73.125 73.156-73.124c14.63-14.625-29.275-58.5-43.906-43.875L256 212.157l-73.156-73.125c-2.06-2.046-4.56-3.015-7.47-3.03z\" fill=\"#ffffff\" fill-opacity=\"1\"></path></g></svg>";
        }
    }

    /* Activate Submenu */
    function toggleItem() {
        if (this.classList.contains("submenu-active")) {
            this.classList.remove("submenu-active");
        } else if (menu.querySelector(".submenu-active")) {
            menu.querySelector(".submenu-active").classList.remove("submenu-active");
            this.classList.add("submenu-active");
        } else {
            this.classList.add("submenu-active");
        }
    }

    /* Close Submenu From Anywhere */
    function closeSubmenu(e) {
        let isClickInside = menu.contains(e.target);

        if (!isClickInside && menu.querySelector(".submenu-active")) {
            menu.querySelector(".submenu-active").classList.remove("submenu-active");
        }
    }
    /* Event Listeners */
    toggle.addEventListener("click", toggleMenu, false);
    for (let item of items) {
        if (item.querySelector(".submenu")) {
            item.addEventListener("click", toggleItem, false);
        }
        item.addEventListener("keypress", toggleItem, false);
    }
    document.addEventListener("click", closeSubmenu, false);


</script>
</body>
</html>