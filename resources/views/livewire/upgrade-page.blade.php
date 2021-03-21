<div>
    <div class="container grid mx-auto lg:grid-cols-3 auto-cols-fr auto-rows-fr lg:gap-2">
        <div class="my-1">
            <img src="\storage\{{ $upgrade->image }}"
                class="mx-auto border-2 border-black rounded-lg card__image"></a>
        </div>
        <div class="mx-1 mb-3 sm:my-1 md:m-0">
            <div class="mb-2 bg-gray-200 border-2 border-black rounded shadow-md">
                <div class="block p-1 mb-2 text-2xl font-medium text-white border-b border-black {{ $background }}">
                    {{ $upgrade->name }}</div>
                <div class="mx-2 mb-2">
                    <p class="pb-1 mb-1 text-xl font-semibold">Faction(s): @foreach ($upgrade->factions as $faction)<a href="/factions/{{ $faction->slug }}"
                                class="inline-block text-center p-0.5 text-white border border-black rounded-full bg-{{ $faction->bg_color }} px-2 py-1 text-sm font-bold">{{ strtoupper($faction->name) }}</a>
                        @endforeach</p>
                    <div class="block my-1 border-b border-gray-400 border-dashed"></div>
                    <p class="pb-1 mb-1 text-xl font-semibold">Special(s): @foreach ($upgrade->uspecials as $special)
                            <span
                                class="inline-block text-center p-0.5 text-white border border-black rounded-full {{ $background }} px-2 py-1 text-sm font-bold ">
                                {{ strtoupper($special->name) }}
                            </span>
                        @endforeach</p>
                    <div class="block my-1 border-b border-gray-400 border-dashed"></div>
                    <p class="pb-1 mb-1 text-xl font-semibold">Restricted(s): @foreach ($upgrade->urestricteds as $restricted)<span
                                class="inline-block text-center p-0.5 text-white border border-black rounded-full {{ $background }} px-2 py-1 text-sm font-bold">{{ strtoupper($restricted->name) }}</span>
                        @endforeach</p>
                </div>
            </div>
            @if (count($upgrade->erratas) > 0)
                <div class="mb-2 bg-gray-200 border-2 border-black rounded">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white border-b border-black {{ $background }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                            class="inline-block">
                            <g class="" transform="translate(0,0)" style="">
                                <path
                                    d="M168.8 32.89l-32.6 32.53 21.3 21.17L190 54.08zm33.9 33.96l-9.9 9.91 123 123.04 9.9-9.9zm159.4 18.06c-3.7 0-7.4.1-10.9.3-31.9 1.78-56.7 11.76-78.3 26.39l65.5 65.6c3.5 7.3 52 96.2 65.5 123.3-9.7-6.4-123.4-65.4-123.4-65.4l-15.3-15.2v140.3c23.9-14.6 50.1-27.7 83.6-31.2 37.5-4 83.5 4.3 144.2 33.1V118.7c-51.7-22.99-93.3-32.89-127.2-33.69-1.3 0-2.5-.11-3.7-.1zm-230.8 1.03C100.4 88.93 63.44 99 19.05 118.7v243.4C79.85 333.3 125.8 325 163.3 329c33 5.2 58.1 15.8 83.6 31.2V201.6c-38.6-38.5-77.1-77.1-115.6-115.66zm48.8 3.55l-9.9 9.89 123 123.02 9.9-9.9zM336 205.1l-27.5 27.5 55.1 27.6zM143.8 346.7c-32 .3-71.85 9.8-124.75 36v42.5c60.8-28.8 106.75-37.1 144.25-33.1 18.6 2 34.9 6.9 49.8 13.3-4.7 6.1-9.3 13.3-13.9 21.7h117.2c-6-8.2-11.8-15.4-17.7-21.6 15-6.5 31.4-11.4 50.1-13.4 37.5-4 83.5 4.3 144.2 33.1v-42.5c-53.1-26.3-93.1-35.9-125.2-36h-3.1c-4.8.1-9.4.4-13.9.9-34 3.6-59.6 18-85.6 34.4-5.7-.8-13-1.8-18.3-.9-27.2-16.2-58.2-30.4-85.5-33.5-5.6-.6-11.5-.9-17.6-.9z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>Errata History
                    </div>
                    <div class="mx-2 mb-2">
                        @foreach ($upgrade->erratas as $errata)
                            {!! nl2br(fauxdown($errata->description)) !!}
                            <span class="block italic text-right">-{{ $errata->season->name }}</span>
                            @if (!$loop->last)
                                <div class="block my-3 border-b border-gray-400 border-dashed"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        @if (count($upgrade->minis) > 0)
            <div class="mx-1 mb-3 sm:my-1 md:m-0">
                <div class="mb-2 bg-gray-200 border-2 border-black rounded">
                    <div
                        class="block p-1 mb-2 text-xl font-medium text-white align-middle border-b border-black bg-gradient-to-r from-guild-light to-exso-light">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 32px; width: 32px;"
                            class="inline-block">
                            <g class="" transform="translate(0,0)" style="">
                                <path
                                    d="M369.1 21.22c-19.2 0-36.2 10.63-47.9 26.47-11.7 15.84-18.6 37.03-18.6 60.31 0 21.1 5.7 40.5 15.5 55.7-5.7 1.6-11 3.9-15.9 6.6-10.2-8.5-22.6-13.6-35.9-13.6-19.3 0-36.3 10.6-48 26.4-4.7 6.4-8.6 13.6-11.6 21.5-4.8-2.4-9.9-4.3-15.5-5.6 9.4-15.1 14.8-34.1 14.8-54.7 0-23.2-6.9-44.43-18.6-60.27-11.7-15.84-28.7-26.5-47.9-26.5s-36.2 10.66-47.94 26.5C79.87 99.87 73 121.1 73 144.3c0 21.1 5.69 40.5 15.47 55.8-32.07 9.1-50.29 37.1-59.44 70-9.79 35.2-10.87 77.3-10.87 115.6v9.4h45.5l6.78 99.3h18.75l-7.28-106.5-4.1-80-18.65 1 3.47 67.5H36.97c.24-35.2 1.97-72.1 10.09-101.2 8.78-31.6 23.32-52.8 51.25-58.2l4.69-.1c10.3 8.8 22.9 14.2 36.5 14.2 14.1 0 26.9-5.7 37.4-15h4.6c7.8 1.2 14.4 3.5 20.1 6.7-1.2 6.6-1.9 13.5-1.9 20.6 0 21.1 5.7 40.5 15.5 55.8-32.1 9.1-50.3 37.2-59.4 70-9.8 35.2-10.9 77.3-10.9 115.6v9.4c21.7-.3 42.8.2 64.3.2l-.5-7.3-4.1-80-18.7.9 3.4 67.5h-25.6c.3-35.2 2-72.1 10.1-101.2 8.7-31.6 23.3-52.7 51.1-58.2l4.9-.1c10.3 8.8 22.8 14.2 36.4 14.2 14.1 0 27-5.7 37.5-15h4.4c15.4 2.4 26.1 8.9 34.5 18.6 8.5 9.7 14.5 23.2 18.5 39.2 7.3 29.5 7.7 66.9 7.7 102.5h-23.4l3.5-67.5-18.7-.9-4.2 82-.3 5.3c20.8 0 43.3-.3 61.9-.2v-9.4c0-38.1.5-80.6-8.4-116.3-4.4-17.8-11.3-34.1-22.4-47-9.7-11.1-22.7-19.4-38.8-23.4 9.4-15.1 14.7-34.1 14.7-54.7 0-22.5-6.4-43.2-17.5-58.8 3.9-1.8 8.1-3.1 12.7-4h4.7c10.3 8.8 22.9 14.2 36.5 14.2 14.1 0 27-5.8 37.4-15l4.6-.1c15.4 2.5 26 8.9 34.4 18.6 8.5 9.8 14.5 23.3 18.5 39.3 7.3 29.4 7.7 66.8 7.7 102.4h-23.4l3.5-67.4-18.7-1-4.1 79.7-8.6 143.1h18.7l8.2-135.7h43.1v-9.3c0-38.2.6-80.7-8.3-116.3-4.5-17.9-11.4-34.2-22.5-47-9.6-11.2-22.6-19.5-38.8-23.5 9.4-15.1 14.8-34 14.8-54.6 0-23.28-6.9-44.47-18.6-60.31-11.6-15.29-31.5-26.13-47.9-26.47zm0 18.69c12.4 0 23.9 6.69 32.9 18.87 9 12.19 14.9 29.67 14.9 49.22 0 19.5-5.9 37-14.9 49.2-9 12.2-20.5 18.9-32.9 18.9-12.3 0-23.9-6.7-32.9-18.9s-14.9-29.7-14.9-49.2c0-19.55 5.9-37.03 14.9-49.22 9-12.18 20.6-18.87 32.9-18.87zM139.5 76.22c12.4 0 23.9 6.72 32.9 18.9s14.9 29.68 14.9 49.18-5.9 37-14.9 49.2c-9 12.2-20.5 18.9-32.9 18.9-12.4 0-23.9-6.7-32.9-18.9-8.97-12.2-14.91-29.7-14.91-49.2 0-19.5 5.94-37 14.91-49.17 9-12.19 20.5-18.91 32.9-18.91zm197.8 22.34v18.64h22.5V98.56h-22.5zm41.1 0v18.64h22.5V98.56h-22.5zM107.7 134.9v18.7h22.5v-18.7h-22.5zm41.1 0v18.7h22.5v-18.7h-22.5zm117.5 40.4c12.3 0 23.8 6.7 32.8 18.9 9 12.2 15 29.7 15 49.2 0 19.6-6 37-15 49.2-9 12.2-20.5 18.9-32.8 18.9-12.4 0-24-6.7-33-18.9-8.9-12.2-14.9-29.6-14.9-49.2 0-19.5 6-37 14.9-49.2 9-12.2 20.6-18.9 33-18.9zM234.5 234v18.7h22.4V234zm41.1 0v18.7H298V234h-22.4z"
                                    fill="#ffffff" fill-opacity="1"></path>
                            </g>
                        </svg>Related Characters
                    </div>
                    <div class="mx-2 mb-2">
                        @foreach ($upgrade->minis as $mini)
                            <a href="{{ route('character.view', $mini->slug) }}" class="inline-block text-center p-0.5 text-white border border-black rounded-full
                            {{ $this->getBackground($mini) }}
                            px-2 py-1 font-bold mb-1 cursor-pointer">{{ strtoupper($mini->name) }}</a><br />
                        @endforeach

                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
