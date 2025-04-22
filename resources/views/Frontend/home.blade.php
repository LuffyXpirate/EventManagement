<x-frontend-layout>

    <!-- Hero Section -->
    <section class="pt-24 pb-12 md:py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        Plan Your Perfect Event With Us
                    </h1>
                    <p class="text-lg text-gray-600 mb-8">
                        From corporate meetings to dream weddings, we handle every detail so you don't have to.
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ route('register') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                            Create Event
                        </a>
                        <a href="{{ route('frontend.event') }}" class="px-6 py-3 border-2 border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-50 transition-colors">
                            Explore Events
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 mt-12 md:mt-0">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865" 
                         alt="Event Management" 
                         class="rounded-xl shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose Our Platform</h2>
                <div class="w-20 h-1 bg-indigo-600 mx-auto"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature Card -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-check text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Easy Scheduling</h3>
                    <p class="text-gray-600">Intuitive interface to schedule and manage your events with ease.</p>
                </div>

                <!-- Repeat other features similarly -->
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Guest Management</h3>
                    <p class="text-gray-600">Track attendees, send invitations, and manage RSVPs effortlessly.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-bell text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Reminders</h3>
                    <p class="text-gray-600">Automated reminders to keep everyone informed about your events.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-chart-pie text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Analytics</h3>
                    <p class="text-gray-600">Get insights on event performance and attendee engagement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Create Your Next Event?</h2>
            <p class="text-gray-200 mb-8 max-w-2xl mx-auto">
                Join thousands of happy users who have simplified their event planning process.
            </p>
            <a href="signin.html" class="inline-block px-8 py-3 bg-white text-indigo-600 rounded-lg hover:bg-gray-100 transition-colors">
                Get Started Now
            </a>
        </div>
    </section>

    <!-- Footer -->

</x-frontend-layout>
    <!-- Flowbite JS -->
