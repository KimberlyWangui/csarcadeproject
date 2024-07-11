<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    
    

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- User Details -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold mb-2">{{ __('User Details') }}</h3>
                            <p><strong>{{ __('Name:') }}</strong> {{ Auth::user()->username }}</p>
                            <p><strong>{{ __('Email:') }}</strong> {{ Auth::user()->email }}</p>
                            <!-- You can display more user details here -->
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold mb-2">{{ __('Booking History') }}</h3>
                            <!-- Display booking history here -->
                        </div>

                        <!-- Offers and Discounts -->
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold mb-2">{{ __('Offers and Discounts') }}</h3>
                            <!-- Display offers and discounts here -->
                            <div class="border rounded-lg p-4 bg-gray-100">
                                <h4 class="text-sm font-semibold">Special Offer</h4>
                                <p class="text-gray-700">Get 20% off on your next booking!</p>
                            </div>
                            <!-- Add more offers and discounts as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
