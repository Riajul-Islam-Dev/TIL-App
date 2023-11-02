<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold">Company Information</h1>

                    <div class="mb-4">
                        <p><strong>Name:</strong> {{ $company->name }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Company ID:</strong> {{ $company->company_id }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Address:</strong> {{ $company->address }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Phone:</strong> {{ $company->phone }}</p>
                    </div>

                    <div class="mb-4">
                        <p><strong>Status:</strong> {{ $company->status }}</p>
                    </div>

                    <a href="{{ route('admin.companies.index') }}"
                        class="px-4 py-2 font-medium text-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
