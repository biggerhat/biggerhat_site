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
            <li class="order-3 hidden w-full p-2 text-center item lg:block lg:w-auto lg:relative"><a href="/characters" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Characters</a></li>
            <li class="order-3 hidden w-full p-2 text-center item lg:block lg:w-auto lg:relative"><a href="/references" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">References</a></li>
            <li class="order-3 hidden w-full p-2 text-center item lg:block lg:w-auto lg:relative"><a href="/resources" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Resources</a></li>
            <li class="order-3 hidden w-full p-2 text-center item lg:block lg:w-auto lg:relative"><a href="/tools" class="block p-4 text-gray-200 rounded-lg hover:text-white hover:bg-gray-700">Tools</a></li>
            
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