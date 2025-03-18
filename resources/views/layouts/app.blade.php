<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservelt Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('tailwind.config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    @livewireStyles
    @livewireScripts
</head>
<body class="bg-cover bg-center bg-no-repeat bg-fixed min-h-screen relative" style="background-image: url('/images/test.jpg');">
    <!-- Navigation -->
    <nav id="navbar" class="w-full h-[88px] mx-auto flex items-center justify-between bg-[#00000666] px-6 sticky top-0 z-50 backdrop-blur-md transition-all duration-300 ease-in-out">
        <div class="text-white text-xl font-bold">Reservelt</div>
        <div class="flex items-center space-x-6">
            <a href="#" class="text-white text-lg">Home</a>
            <a href="#about" class="text-white text-lg scroll-smooth">About us</a>
            @auth
            <span class="text-white text-lg">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to logout?');">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
                    Logout
                </button>
            </form>
        </div>
        @else
            <a href="{{ route('login') }}" class="bg-primary text-white px-4 py-2 rounded-lg">Sign in</a>
            <a href="{{ route('register') }}" class="border border-white text-white px-4 py-2 rounded-lg">Sign up</a>
        @endauth
        </div>
    </nav>
    <!-- Contenu principal -->
    <div class="flex flex-col items-center justify-center text-center mt-16">
        <h1 class="text-white text-4xl font-bold">Welcome to Reservelt Booking</h1>
        <p class="text-white text-lg mt-2">You will find the best hotel for you</p>

        <livewire:hotel-search />
         <div class="w-full px-6 mt-10">
        <h2 class="text-3xl font-bold text-white text-center mb-6">Explore our Hotels</h2>

    <livewire:booking-manager />

<section id="about" class="bg-gray-900 text-white py-16 px-6 md:px-12">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-4xl font-bold mb-6">About Reservelt Booking</h2>
        <p class="text-lg text-gray-300 leading-relaxed">
            Welcome to <span class="text-blue-400 font-semibold">Reservelt Booking</span>, your gateway to the best hotels at unbeatable prices.
            Whether you're planning a weekend getaway or a long vacation, we make booking easy, fast, and secure.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 max-w-6xl mx-auto">
        <!-- Feature 1 -->
        <div class="bg-gray-800 p-6 rounded-lg text-center">
            <img src="/images/hotel.png" alt="Hotels" class="mx-auto w-16 mb-4">
            <h3 class="text-xl font-semibold mb-2">Top Hotels In Tunisia</h3>
            <p class="text-gray-400">Explore luxurious, budget-friendly, and unique stays tailored to your needs.</p>
        </div>

        <!-- Feature 2 -->
        <div class="bg-gray-800 p-6 rounded-lg text-center">
            <img src="/images/security.png" alt="Security" class="mx-auto w-16 mb-4">
            <h3 class="text-xl font-semibold mb-2">Secure & Easy Booking</h3>
            <p class="text-gray-400">Enjoy a seamless booking experience with secure payment and instant confirmations.</p>
        </div>

        <!-- Feature 3 -->
        <div class="bg-gray-800 p-6 rounded-lg text-center">
            <img src="/images/customer-service.png" alt="Support" class="mx-auto w-16 mb-4">
            <h3 class="text-xl font-semibold mb-2">24/7 Customer Support</h3>
            <p class="text-gray-400">Need help? Our support team is always here to assist you at any time.</p>
        </div>
    </div>
</section>

<footer class="bg-gray-900 text-white py-10 mt-16">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <!-- Brand & Description -->
            <div>
                <h2 class="text-2xl font-bold">Reservelt</h2>
                <p class="text-gray-400 mt-2">
                    Discover the best hotels for your next trip with ease and comfort.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-semibold">Quick Links</h3>
                <ul class="mt-3 space-y-2">
                    <li><a href="#" onclick="scrollToTop()" class="text-white text-lg">Home</a></li>
                    <li><a href="#about" class="text-gray-400 hover:text-white transition">About Us</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-xl font-semibold">Contact Us</h3>
                <p class="text-gray-400 mt-2">Email: support@reservelt.com</p>
                <p class="text-gray-400">Phone: +123 456 789</p>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="border-t border-gray-700 mt-8 pt-4 text-center text-gray-400 text-sm">
            &copy; 2025 Reservelt. All Rights Reserved.
        </div>
    </div>
</footer>

<!-- FontAwesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

<script>
    let prevScrollpos = window.pageYOffset;
    const navbar = document.getElementById("navbar");

    window.onscroll = function() {
        let currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            navbar.style.top = "0";
        } else {
            navbar.style.top = "-88px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>


<script src="{{ asset('vendor/livewire/livewire.js') }}"></script>



</body>
</html>

