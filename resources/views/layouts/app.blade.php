<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservelt Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('tailwind.config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

</head>
<body class="bg-cover bg-center bg-no-repeat min-h-screen relative" style="background-image: url('/images/test.jpg');">
    <!-- Navigation -->
    <nav class="w-full h-[88px] mx-auto flex items-center justify-between bg-[#00000666] px-6">
        <div class="text-white text-xl font-bold">Reservelt</div>
        <div class="flex items-center space-x-6">
            <a href="#" class="text-white text-lg">Home</a>
            <a href="#" class="text-white text-lg">About us</a>
           <a href="{{ route('login') }}" class="bg-primary text-white px-4 py-2 rounded-lg">Sign in</a>
           <a href="{{ route('register') }}" class="border border-white text-white px-4 py-2 rounded-lg">Sign up</a>

        </div>
    </nav>
    <!-- Contenu principal -->
    <div class="flex flex-col items-center justify-center text-center mt-16">
        <h1 class="text-white text-4xl font-bold">Welcome to Reservelt Booking</h1>
        <p class="text-white text-lg mt-2">You will find the best hotel for you</p>

        <!-- Formulaire de recherche -->
        <div class="bg-white bg-opacity-50 p-6 rounded-lg shadow-md flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 mt-6 backdrop-blur-md w-full max-w-4xl mx-auto">
            <input type="text" placeholder="Destination" class="p-2 border border-gray-400 rounded-md flex-1">
            <input type="date" class="p-2 border border-gray-400 rounded-md flex-1">
            <input type="date" class="p-2 border border-gray-400 rounded-md flex-1">
            <button class="text-white px-4 py-2 rounded-lg">Search</button>
        </div>
         <div class="container mx-auto mt-10 p-6">
        <h2 class="text-3xl font-bold text-white text-center mb-6">Explore our Hotels</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
    @if($properties)
       @foreach($properties as $hotel)
    <div class="bg-white bg-opacity-30 backdrop-blur-md shadow-lg rounded-lg p-4">
        <img src="https://via.placeholder.com/300" alt="{{ $hotel->name }}" class="w-full h-40 object-cover rounded-md">

        <h3 class="text-lg font-semibold mt-3">{{ $hotel->name }}</h3>
        <p class="text-gray-100 text-sm">{{ $hotel->description }}</p>
        <p class="text-xl font-bold text-blue-300 mt-2">${{ number_format($hotel->price_per_night, 2) }}</p>




    </div>
@endforeach
@endif
<!-- Include Livewire Component -->
@livewire('booking-manager')


@livewireScripts
<script src="{{ asset('vendor/livewire/livewire.js') }}"></script>

</body>
</html>

