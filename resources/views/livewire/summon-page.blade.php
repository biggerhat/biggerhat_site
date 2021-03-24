<div>
    <div class="container mx-auto">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-3xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                Summoning Charts
            </span>
        </div>
        <div class="container grid px-2 my-2 lg:grid-cols-5">
            <div class="lg:col-span-3 lg:col-start-2">
                <select name="master" wire:model="master"
                    class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow hover:border-gray-500 focus:outline-none focus:shadow-outline">
                    <option value=""></option>
                    <option value="asami-tanaka">Asami (Oni)</option>
                    <option value="dashel-barker">Dashel Barker (Guard)</option>
                    <option value="dreamer">Dreamer (Nightmare)</option>
                    <option value="forgotten-marshal">Forgotten Marshal (Forgotten)</option>
                    <option value="kirai-ankou">Kirai Ankou (Urami)</option>
                    <option value="nicodem">Nicodem (Mortuary/Zombie)</option>
                    <option value="ramos">Ramos (Machina)</option>
                    <option value="sandeep-desai">Sandeep Desai (Academic/Elemental)</option>
                    <option value="somer-teeth-jones">Som'er Teeth Jones (Big Hat)</option>
                    <option value="tara-blake">Tara Blake (Obliteration)</option>
                    <option value="ulix-turner">Ulix Turner (Pig/Sooey)</option>
                    <option value="widow-weaver">Widow Weaver (Puppet)</option>
                </select>
            </div>
        </div>
    </div>
    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    <div class="container mx-auto">
        <div class="px-2">
            <img src="./images/{{ $chart }}" class="mx-auto border-2 border-black rounded">
        </div>
    </div>
    <div class="container grid px-2 mx-auto lg:grid-cols-5">
        <div class="text-sm italic text-center lg:col-span-3 lg:col-start-2">
            *All Images Provided Courtesy of Trisha Waddell from "A Wyrd Place"
        </div>
    </div>
</div>
