<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold">Create User</h1>
                    <form method="post" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div class="mb-4 flex flex-wrap">
                            <div class="w-1/2 pr-2">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" />
                                @error('name')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-1/2 pl-2">
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" />
                                @error('email')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap">
                            <div class="w-1/2 pr-2">
                                <label for="user_type"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">User Type</label>
                                <select name="user_type" id="user_type"
                                    class="form-select rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700">
                                    <option value="Admin">Admin</option>
                                    <option value="Regular">Regular</option>
                                </select>
                                @error('user_type')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-1/2 pl-2">
                                <label for="company_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company
                                    Name</label>
                                <select name="company_id" id="company_id"
                                    class="form-select rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->company_id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap">
                            <div class="w-1/2 pr-2">
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" />
                                @error('password')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-1/2 pr-2 pl-2">
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" value="1" id="status"
                                    class="form-checkbox h-6 w-6 text-indigo-600" checked>
                                @error('status')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Menu
                                Permissions</label>
                            <div class="space-y-2">
                                @foreach ($menuLinks as $menuLink)
                                    <label class="inline-flex items-center pr-1 bg-gray-500">
                                        <input type="checkbox" name="menu_permitted[]" value="{{ $menuLink->menu_id }}"
                                            class="form-checkbox h-3 w-3 text-indigo-600">
                                        <span class="ml-2">{{ $menuLink->menu_name }}</span>
                                    </label>
                                @endforeach
                                @error('menu_permitted')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="px-4 py-2 font-medium text-white bg-indigo-600 border border-indigo-600 rounded-md hover-bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            Create User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
