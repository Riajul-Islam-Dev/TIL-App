<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Menu Link: ') }} {{ $menu_link->menu_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold">Edit Menu Link: {{ $menu_link->menu_name }}</h1>
                    <form method="post" action="{{ route('admin.menu_links.update', $menu_link) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="menu_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Menu ID</label>
                            <input type="text" name="menu_id" id="menu_id" value="{{ $menu_link->menu_id }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" required />
                        </div>

                        <div class="mb-4">
                            <label for="menu_name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Menu Name</label>
                            <input type="text" name="menu_name" id="menu_name" value="{{ $menu_link->menu_name }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" required />
                        </div>

                        <div class="mb-4">
                            <label for="url"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL</label>
                            <input type="text" name="url" id="url" value="{{ $menu_link->url }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" required />
                        </div>

                        <button type="submit"
                            class="px-4 py-2 font-medium text-white bg-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            Update Menu Link
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
