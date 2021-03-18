@extends('main')

@section('title')
    - About Bigger Hat
@endsection

@section('content')
    <div class="container mx-auto text-4xl text-center text-gray-900 faction_header lg:text-6xl">
        About Us
    </div>
    <div class="container grid pt-4 mx-auto lg:grid-cols-5">
        <div class="text-xl text-center lg:col-span-3 lg:col-start-2">
            <p class="my-2">Bigger Hat was started by two Malifaux players from Central Florida just looking to make the
                most in-depth
                and
                awesome Malifaux database they could. From there we've built on and added more and more features with many
                more
                planned to come. We just want to do everything we can for the benefit of the excellent Malifaux community.
            </p>
            <p class="my-2">If you have any questions or want to submit any Tacticas or any content at all, feel free to
                contact us one
                of the ways listed below.</p>
        </div>
    </div>
    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    <div class="container mx-auto text-4xl text-center text-gray-900 faction_header lg:text-6xl">
        Contact Us
    </div>
    <div class="container grid pt-4 mx-auto lg:grid-cols-3">
        <div class="block px-2 mx-2 mb-2 text-center lg:px-0">
            <div class="block w-full p-2 border-2 border-gray-900 rounded active:outline-none">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-3xl text-transparent text-gray-900 lg:text-4xl faction_header">
                        Discord
                    </span>
                </div>
                <img src="\storage\resources/February2021/ZqjSYMiWKfgAPeQmAFch.png"
                    class="p-2 mx-auto border border-black rounded-lg">
                <div class="block my-2 italic">
                    Our own discord where anyone can come hang out and discuss the game or express any feedback or ideas
                    they have for the website.
                </div>
                <div class="p-2">
                    <a class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                        href="https://discord.gg/AT236KeAWT" target="discord">Visit
                        Our Discord</a>
                </div>
            </div>
        </div>
        <div class="block px-2 mx-2 mb-2 text-center lg:px-0">
            <div class="block w-full p-2 border-2 border-gray-900 rounded active:outline-none">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-3xl text-transparent text-gray-900 lg:text-4xl faction_header">
                        Facebook
                    </span>
                </div>
                <img src="\storage\resources/February2021/ZqjSYMiWKfgAPeQmAFch.png"
                    class="p-2 mx-auto border border-black rounded-lg">
                <div class="block my-2 italic">
                    Our Facebook page where we announce any changes or live streams we might be having.
                </div>
                <div class="p-2">
                    <a class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                        href="https://www.facebook.com/biggerhat/" target="facebook">Visit
                        Our Facebook</a>
                </div>
            </div>
        </div>
        <div class="block px-2 mx-2 mb-2 text-center lg:px-0">
            <div class="block w-full p-2 border-2 border-gray-900 rounded active:outline-none">
                <div class="block w-full h-full py-2 text-center">
                    <span class="text-3xl text-transparent text-gray-900 lg:text-4xl faction_header">
                        Reddit
                    </span>
                </div>
                <img src="\storage\resources/February2021/ZqjSYMiWKfgAPeQmAFch.png"
                    class="p-2 mx-auto border border-black rounded-lg">
                <div class="block my-2 italic">
                    Our Reddit Account.
                </div>
                <div class="p-2">
                    <a class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                        href="https://www.reddit.com/user/Biggerhat" target="reddit">Visit
                        Our Reddit</a>
                </div>
            </div>
        </div>

    </div>
@endsection
