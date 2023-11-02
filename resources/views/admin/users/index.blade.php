<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('admin.users.create') }}"
                        class="px-4 py-2 font-medium text-white bg-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        Create User
                    </a>
                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        User ID
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        User Type
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Company ID
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->user_id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->user_type }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->company_id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                    class="px-4 py-2 font-medium text-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                                    Edit
                                                </a>
                                                <a href="{{ route('admin.users.show', $user) }}"
                                                    class="px-4 py-2 font-medium text-green-600 border border-green-600 rounded-md hover:bg-green-600 hover:text-white focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-50">
                                                    Show
                                                </a>
                                                <a href="{{ route('admin.users.destroy', $user) }}"
                                                    class="px-4 py-2 font-medium text-red-600 border border-red-600 rounded-md hover:bg-red-600 hover:text-white focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
