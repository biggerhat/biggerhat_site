<div>
    <div class="container mx-auto">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-3xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                Frequently Asked Questions
            </span>
        </div>
        <div class="grid px-2 my-2 lg:grid-cols-5">
            <div class="lg:col-span-3 lg:col-start-2">
                <label for="query" class="inline-block font-bold">Search FAQ: </label>
                <input type="text"
                    class="w-full p-1 text-lg bg-gray-200 border border-gray-900 rounded focus:outline-none"
                    wire:model.debounce.500ms="query" name="query" placeholder="Enter Search Term">
                @if ($query)
                    <span class="inline-block p-2 mx-auto font-bold cursor-pointer" wire:click="clearQuery">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="inline-block"
                            style="height: 25px; width: 25px;">
                            <g class="" transform="translate(0,0)" style="">
                                <path d="M256 16C123.45 16 16 123.45 16 256s107.45 240 240 240 240-107.45 240-240S388.55 16 256 16zm0
                60c99.41 0 180 80.59 180 180s-80.59 180-180 180S76 355.41 76 256 156.59 76 256 76zm-80.625
                60c-.97-.005-2.006.112-3.063.313v-.032c-18.297 3.436-45.264 34.743-33.375 46.626l73.157 73.125-73.156
                73.126c-14.63 14.625 29.275 58.534 43.906 43.906L256 299.906l73.156 73.156c14.63 14.628 58.537-29.28
                43.906-43.906l-73.156-73.125 73.156-73.124c14.63-14.625-29.275-58.5-43.906-43.875L256
                212.157l-73.156-73.125c-2.06-2.046-4.56-3.015-7.47-3.03z" fill="#000000" fill-opacity="1"
                                    transform="translate(25.6, 25.6) scale(0.9, 0.9) rotate(0, 256, 256) skewX(0) skewY(0)">
                                </path>
                            </g>
                        </svg> Clear
                    </span>
                @endif
            </div>
        </div>
        <div class="grid px-2 lg:grid-cols-5">
            @foreach ($results as $question)
                <div class="p-2 my-1 bg-gray-200 border-2 border-black rounded lg:col-span-3 lg:col-start-2">
                    <span class="font-bold">Q.</span> {!! fauxdown($question['question']) !!} <br />
                    <span class="font-bold">A.</span> {!! fauxdown($question['answer']) !!} <br />
                </div>
            @endforeach
        </div>
    </div>
</div>
