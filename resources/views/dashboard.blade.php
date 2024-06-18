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
                {{ __("You're logged in!") }}
                    <div class="mt-4">
                        <p><strong>{{ __('Name:') }}</strong> {{ Auth::user()->username }}</p>
                        <p><strong>{{ __('Email:') }}</strong> {{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
