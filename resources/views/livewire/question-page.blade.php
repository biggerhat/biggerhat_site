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
                    wire:model.defer="query" name="query" placeholder="Enter Search Term">
            </div>
            <div class="block mt-3 text-center lg:col-span-5">
                <button wire:click="search"
                    class="p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
                    Search</button>
                <button wire:click="clearQuery"
                    class="p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
                    Clear</button>
            </div>
        </div>
        <div class="grid px-2 lg:grid-cols-5">
            @if ($results)
                @foreach ($results as $question)
                    <div class="p-2 my-1 bg-gray-200 border-2 border-black rounded lg:col-span-3 lg:col-start-2">
                        <div><span class="font-bold">Q.</span> {!! fauxdown($question['question']) !!}</div>
                        <div><span class="font-bold">A.</span> {!! fauxdown($question['answer']) !!}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
