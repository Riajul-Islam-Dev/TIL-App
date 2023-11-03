<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Menu Link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold">Edit Menu Link</h1>
                    <form method="post" action="{{ route('admin.menu_links.update', $menu_link->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4 flex flex-wrap">
                            <div class="w-1/2 pr-2">
                                <label for="menu_name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Menu Name</label>
                                <input type="text" name="menu_name" id="menu_name"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700"
                                    value="{{ $menu_link->menu_name }}" /> <!-- Pre-fill with existing value -->
                                @error('menu_name')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-1/2 pl-2">
                                <label for="url"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL</label>
                                <input type="text" name="url" id="url"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700"
                                    value="{{ $menu_link->url }}" /> <!-- Pre-fill with existing value -->
                                @error('url')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap">
                            <div class="w-1/2 pr-2">
                                <label for="parent_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Parent
                                    Menu</label>
                                <select name="parent_id" id="parent_id"
                                    class="form-select rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700">
                                    <option value="">Select a Parent Menu (Optional)</option>
                                    @foreach ($menuLinks as $menu)
                                        <option value="{{ $menu->id }}"
                                            @if ($menu->id == $menu_link->parent_id) selected @endif>
                                            {{ $menu->menu_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-1/2 pl-2">
                                <label for="menu_type"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Menu Type</label>
                                <select name="menu_type" id="menu_type"
                                    class="form-select rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700">
                                    <option value="Top-Nav" @if ($menu_link->menu_type == 'Top-Nav') selected @endif>
                                        Top Navigation
                                    </option>
                                    <option value="Side-Bar" @if ($menu_link->menu_type == 'Side-Bar') selected @endif>
                                        Side Menu Bar
                                    </option>
                                </select>
                            </div>
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
