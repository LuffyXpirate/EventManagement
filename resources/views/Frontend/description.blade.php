<x-frontend-layout>
    <section class="pt-24 pb-12 md:py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Event Image -->
                    <div class="h-96 md:h-auto">
                        <img src="{{ $event->photo ? asset('storage/' . $event->photo) : 'https://source.unsplash.com/800x600/?event' }}" 
                             alt="{{ $event->title }}" 
                             class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Event Details -->
                    <div class="p-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $event->title }}</h1>
                        
                        <div class="flex flex-wrap gap-4 mb-6">
                            <div class="bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $event->formatted_date }}
                            </div>
                            <div class="bg-green-100 text-green-800 px-4 py-2 rounded-full flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $event->venue->name }}
                            </div>
                        </div>

                        <div class="prose max-w-none mb-8">
                            {!! nl2br(e($event->description)) !!}
                        </div>

                        <div class="border-t pt-6">
                            <!-- Ticket Purchase Form -->
                            <form action="{{ route('events.purchase', $event) }}" method="POST">
                                @csrf
                                <div class="space-y-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-lg font-medium text-gray-700 mb-2">
                                                Price per ticket: ${{ number_format($event->price, 2) }}
                                            </label>
                                            <select name="quantity" 
                                                    class="block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                                    required
                                                    {{ $event->availableSeats() === 0 ? 'disabled' : '' }}>
                                                @for($i = 1; $i <= min(10, $event->availableSeats()); $i++)
                                                    <option value="{{ $i }}">{{ $i }} ticket(s)</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-lg font-medium text-gray-700 mb-2">
                                                Payment Method
                                            </label>
                                            <select name="payment_method" 
                                                    class="block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                                    required>
                                                <option value="credit_card">Khalti</option>
                                                <option value="paypal">Cash On Delivery</option>
                                                <!-- Add more payment methods as needed -->
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm text-gray-600">
                                            {{ $event->availableSeats() }} seats remaining
                                        </p>
                                        <button type="submit" 
                                                class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition flex items-center"
                                                {{ $event->availableSeats() === 0 ? 'disabled' : '' }}>
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            Purchase Tickets
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>