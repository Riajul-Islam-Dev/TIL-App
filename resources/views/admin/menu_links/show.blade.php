<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu Link Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold">Menu Link Information</h1>

                    <div class="mb-4">
                        <p><strong>Menu ID:</strong> {{ $menu_link->menu_id }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Menu Name:</strong> {{ $menu_link->menu_name }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>URL:</strong> {{ $menu_link->url }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Parent ID:</strong> {{ $menu_link->parent_id }}</p>
                    </div>

                    <a href="{{ route('admin.menu_links.index') }}"
                        class="px-4 py-2 font-medium text-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
