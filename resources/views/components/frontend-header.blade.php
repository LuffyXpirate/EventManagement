<nav class="bg-white border-gray-200 fixed w-full z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="" class="flex items-center">
                    <span class="text-2xl font-bold text-gray-900">Event<span class="text-indigo-600">Ease</span></span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-900 hover:text-indigo-600 font-medium">Home</a>
                <a href="{{ route('frontend.event') }}">Events</a>
                <a href="{{ route('frontend.about') }}" class="text-gray-900 hover:text-indigo-600 font-medium">About-Us</a>
                <a href="{{ route('frontend.contact') }}" class="text-gray-900 hover:text-indigo-600 font-medium">Contact</a>
            </div>

            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('login') }}"
                    class="px-4 py-2 border-2 border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-50 transition-colors">Login</a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">Register</a>
            </div>

            <!-- Mobile menu button -->
            <button data-collapse-toggle="mobile-menu" type="button"
                class="md:hidden p-2 text-gray-700 hover:text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <a href="#" class="block px-3 py-2 text-gray-900 hover:bg-gray-100">Home</a>
            <a href="createevent.html" class="block px-3 py-2 text-gray-900 hover:bg-gray-100">Events</a>
            <a href="about.html" class="block px-3 py-2 text-gray-900 hover:bg-gray-100">About</a>
            <a href="contact.html" class="block px-3 py-2 text-gray-900 hover:bg-gray-100">Contact</a>
            <div class="pt-4 border-t">
                <a href="signin.html" class="block px-3 py-2 text-indigo-600 hover:bg-indigo-50">Login</a>
                <a href="register.html"
                    class="block px-3 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Register</a>
            </div>
        </div>
    </div>
</nav>
