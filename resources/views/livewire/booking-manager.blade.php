<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-4">
    @if($properties)
        @foreach($properties as $hotel)
            <div class="bg-white bg-opacity-30 backdrop-blur-md shadow-lg rounded-lg p-4 w-[350px] min-h-[420px] mx-auto text-center">
                <h3 class="text-lg font-semibold mt-3 mb-1">{{ $hotel->name }}</h3>
                <img src="{{ asset('images/'.$hotel->image) }}" alt="" class="w-full h-40 object-cover rounded-md">
                <p class="text-gray-100 text-sm mt-4">{{ $hotel->description }}</p>
                <p class="text-xl font-bold text-blue-500 mt-2">${{ number_format($hotel->price_per_night, 2) }}</p>
                @auth
                    <button wire:click="showBookingForm({{ $hotel->id }})"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                        Book Now
                    </button>
                @else
                    <div class="mt-4 mb-2">
                        <a href="{{ route('login') }}"
                            class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                            Connect to Book
                        </a>
                    </div>
                @endauth
            </div>
        @endforeach
    @endif

    <!-- Booking Form (Modal) -->
    @if($showForm && $selectedHotel)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-lg font-semibold">{{ $selectedHotel->name }}</h3>
                <img src="{{ asset('images/'.$selectedHotel->image) }}" alt="" class="w-full h-40 object-cover rounded-md">
                <p class="text-gray-700 mt-4">{{ $selectedHotel->description }}</p>
                <p class="text-xl font-bold text-blue-500 mt-2">${{ number_format($selectedHotel->price_per_night, 2) }}</p>

                <form wire:submit.prevent="bookProperty">
                    <label class="block mt-4">Start Date</label>
                    <input type="date" wire:model="start_date" class="w-full p-2 border border-gray-300 rounded-md">
                    @error('start_date') <span class="text-red-500">{{ $message }}</span> @enderror

                    <label class="block mt-2">End Date</label>
                    <input type="date" wire:model="end_date" class="w-full p-2 border border-gray-300 rounded-md">
                    @error('end_date') <span class="text-red-500">{{ $message }}</span> @enderror

                    <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                        Confirm Booking
                    </button>
                </form>

                <button wire:click="closeBookingForm" class="mt-2 text-red-500 underline">Close</button>
            </div>
        </div>
    @endif
</div>
