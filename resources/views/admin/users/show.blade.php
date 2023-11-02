<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold">User Information</h1>

                    <div class="mb-4">
                        <p><strong>User ID:</strong> {{ $user->user_id }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>User Type:</strong> {{ $user->user_type }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Company ID:</strong> {{ $user->company_id }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Menu Permitted:</strong> {{ $user->menu_permitted }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Status:</strong> {{ $user->status }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Email Verified At:</strong> {{ $user->email_verified_at }}</p>
                    </div>

                    <!-- You may not want to display the password field for security reasons -->

                    <div class="mb-4">
                        <p><strong>Created At:</strong> {{ $user->created_at }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Updated At:</strong> {{ $user->updated_at }}</p>
                    </div>

                    <a href="{{ route('admin.users.index') }}"
                        class="px-4 py-2 font-medium text-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
