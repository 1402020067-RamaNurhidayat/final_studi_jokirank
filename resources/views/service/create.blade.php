<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Jasa ' . $name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white px-4 py-5 sm:p-6">
                    <form action="{{ route('service.'.$type.'.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <div class="sm:col-span-6">
                                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                                        {{ __('Nama') }}
                                    </label>
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 border-t border-gray-200 pt-5">
                            <div class="flex justify-end">
                                <span class="inline-flex rounded-md shadow-sm">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                        {{ __('Save') }}
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>