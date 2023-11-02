<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Company: ') }} {{ $company->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold">Edit Company: {{ $company->name }}</h1>
                    <form method="post" action="{{ route('admin.companies.update', $company) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name" value="{{ $company->name }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" required />
                        </div>

                        <div class="mb-4">
                            <label for="company_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company ID</label>
                            <input type="text" name="company_id" id="company_id" value="{{ $company->company_id }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" required />
                        </div>

                        <div class="mb-4">
                            <label for="address"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                            <input type="text" name="address" id="address" value="{{ $company->address }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" />
                        </div>

                        <div class="mb-4">
                            <label for="phone"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ $company->phone }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" />
                        </div>

                        <div class="mb-4">
                            <label for="status"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <input type="number" name="status" id="status" value="{{ $company->status }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full dark:bg-gray-700" />
                        </div>

                        <button type="submit"
                            class="px-4 py-2 font-medium text-white bg-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            Update Company
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
