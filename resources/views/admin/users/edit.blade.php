<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User: ') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold">Edit User: {{ $user->name }}</h1>
                    <form method="post" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" required />
                        </div>

                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" required />
                        </div>

                        <div class="mb-4">
                            <label for="user_type"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">User Type</label>
                            <select name="user_type" id="user_type"
                                class="form-select rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" required>
                                <option value="Admin" {{ $user->user_type === 'Admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="Regular" {{ $user->user_type === 'Regular' ? 'selected' : '' }}>Regular
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="menu_permitted"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Menu
                                Permissions</label>
                            <select name="menu_permitted[]"
                                class="form-multiselect rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700"
                                multiple>
                                {{-- @foreach ($menuLinks as $menuLink)
                                    <option value="{{ $menuLink->id }}"
                                        {{ in_array($menuLink->id, $userMenuPermissions) ? 'selected' : '' }}>
                                        {{ $menuLink->menu_name }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>

                        <button type="submit"
                            class="px-4 py-2 font-medium text-white bg-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            Update User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
