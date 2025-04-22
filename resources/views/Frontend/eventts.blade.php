<x-frontend-layout>
    <!-- Events Header -->
    <section class="pt-24 pb-12 md:py-32 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Explore All Events</h1>
            <p class="text-lg text-gray-600 mb-4">
                Discover upcoming events, workshops, and conferences. Join the ones that inspire you!
            </p>
        </div>
    </section>

    <!-- Events Grid -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($events as $event)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow overflow-hidden">
                    <img src="{{ $event->photo ? asset('storage/' . $event->photo) : 'https://source.unsplash.com/400x250/?event' }}" 
                         alt="{{ $event->title }}" 
                         class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $event->description }}</p>
                        {{-- <div class="text-indigo-600 font-medium mb-2">
                            📅 {{ $event->start_time->format('M d, Y H:i') }}
                        </div> --}}
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-medium">
                                ${{ number_format($event->price, 2) }}
                            </span>
                            <a href="{{ route('events.show', $event) }}" 
                               class="inline-block mt-2 text-sm px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-8">
                {{ $events->links() }}
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-indigo-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Want to Host Your Own Event?</h2>
            <p class="text-gray-200 mb-8 max-w-2xl mx-auto">Easily create and manage your events with our simple event creation tools.</p>
            @auth
                <a href="{{ route('organizer.events.create') }}" 
                   class="inline-block px-8 py-3 bg-white text-indigo-600 rounded-lg hover:bg-gray-100 transition">
                    Create New Event
                </a>
            @else
                <a href="{{ route('register') }}" 
                   class="inline-block px-8 py-3 bg-white text-indigo-600 rounded-lg hover:bg-gray-100 transition">
                    Register to Create Events
                </a>
            @endauth
        </div>
    </section>
</x-frontend-layout>