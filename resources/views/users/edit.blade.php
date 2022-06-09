<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Edit user --}}
        {{-- Change the name or the user type --}}
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ __('Edit User') }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        {{ __('Edit the user information') }}
                    </p>
                </div>
                <div class="p-6 bg-gray-50">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                                {{ __('Name') }}
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="name" name="name" value="{{ $user->name }}" class="form-input block p-2 border border-solid border-gray-600 w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                                {{ __('Email') }}
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="email" name="email" value="{{ $user->email }}" class="form-input block p-2 border border-solid border-gray-600 w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="role" class="block text-sm font-medium leading-5 text-gray-700">
                                {{ __('Role') }}
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <select id="role" name="role_id" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                            {{ $role->display_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <span class="inline-flex rounded-md shadow-sm">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                {{ __('Save') }}
                            </button>
                        </span>
                        <span class="ml-3 inline-flex rounded-md shadow-sm">
                            <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                                {{ __('Cancel') }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </form>
      </div>
  </div>
</x-app-layout>
