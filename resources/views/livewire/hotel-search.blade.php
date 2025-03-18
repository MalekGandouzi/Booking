<div class="bg-white bg-opacity-50 p-6 rounded-lg shadow-md flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 mt-6 backdrop-blur-md w-full max-w-4xl mx-auto">
    <form wire:submit.prevent="searchHotels" class="flex flex-1 gap-4">
        <input
            type="text"
            wire:model="search"
            placeholder="Hotel Name"
            class="p-2 border border-gray-400 rounded-md flex-1 w-full"
        >
        <button
            type="submit"
            class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300 whitespace-nowrap"
        >
            Search
        </button>
    </form>
</div>
