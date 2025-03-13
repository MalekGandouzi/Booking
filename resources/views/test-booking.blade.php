@if($showForm)
    <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold mb-4">Book Property</h2>

            <form wire:submit="bookProperty">
                <input type="hidden" wire:model.live="property_id">

                <!-- Start Date -->
                <label class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" wire:model.live="start_date" class="w-full p-2 border rounded-lg mb-2">
                @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <!-- End Date -->
                <label class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" wire:model.live="end_date" class="w-full p-2 border rounded-lg mb-4">
                @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <!-- Submit Button -->
                <button type="submit" class="bg-purple-700 text-white px-4 py-2 rounded-lg w-full">Confirm Booking</button>
            </form>

            <!-- Cancel Button -->
            <button wire:click="$set('showForm', false)" class="mt-3 text-red-500">Cancel</button>
        </div>
    </div>
@endif
