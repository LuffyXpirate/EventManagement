<x-frontend-layout>
    <section class="bg-indigo-600 text-white text-center py-17">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2">Contact Us</h1>
            <p class="text-lg">We're here to help you plan your perfect event!</p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-16 flex flex-col lg:flex-row gap-10">
        <!-- Contact Form -->
        <div class="flex-1 bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-indigo-600 mb-6">Get in Touch</h2>
            <form id="contactForm" class="space-y-5">
                <div>
                    <label for="name" class="block mb-1 font-medium">Full Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                </div>
                <div>
                    <label for="email" class="block mb-1 font-medium">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                </div>
                <div>
                    <label for="subject" class="block mb-1 font-medium">Subject</label>
                    <input type="text" id="subject" name="subject" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                </div>
                <div>
                    <label for="message" class="block mb-1 font-medium">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none"></textarea>
                </div>
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md transition duration-300">
                    Send Message
                </button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="flex-1 bg-gray-50 p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-indigo-600 mb-6">Contact Information</h2>
            <div class="space-y-4">
                <div class="flex items-start gap-3 bg-indigo-50 p-4 rounded-lg">
                    <span class="text-2xl">📧</span>
                    <div>
                        <p class="font-semibold">Email:</p>
                        <p class="text-gray-700">support@eventease.com</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 bg-indigo-50 p-4 rounded-lg">
                    <span class="text-2xl">📞</span>
                    <div>
                        <p class="font-semibold">Phone:</p>
                        <p class="text-gray-700">981234567</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 bg-indigo-50 p-4 rounded-lg">
                    <span class="text-2xl">📍</span>
                    <div>
                        <p class="font-semibold">Address:</p>
                        <p class="text-gray-700">123 EventEase Street, Itahari, Sunsari</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 bg-indigo-50 p-4 rounded-lg">
                    <span class="text-2xl">⏰</span>
                    <div>
                        <p class="font-semibold">Hours:</p>
                        <p class="text-gray-700">Sun – Fri, 9:00 AM – 6:00 PM</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('frontend.home') }}"
                class="inline-block mt-6 bg-indigo-100 text-indigo-700 font-medium px-4 py-2 rounded-md hover:bg-indigo-200 transition">
                ← Back to Home
            </a>
        </div>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert("Thank you! Your message has been received.");
            this.reset();
        });
    </script>
</x-frontend-layout>
