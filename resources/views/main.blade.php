<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title>BiggerHat.Net @yield('title')</title>

    @yield('head')
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen antialiased bg-gray-300">
    @include('partials.header')

<main class="flex-grow min-h-screen pt-5 pb-5">
    
    @yield('content')
    
</main>
    @include('partials.footer')

    @yield('modals')
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
@livewireScripts
</body>
</html>