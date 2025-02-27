<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start items-center space-x-6">
            <!-- Dashboard Title -->
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">{{ __("You're logged in!") }}</p>
                    <p class="text-gray-700">
                        Now click on the <span class="font-semibold text-blue-500 hover:text-blue-700 cursor-pointer" onclick="window.location='{{ route('people.index') }}'">People</span> link above to view the list of people.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
