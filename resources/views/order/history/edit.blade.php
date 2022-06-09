<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Order #'.$order->id) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ __('Edit Order #'.$order->id) }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        {{ __('Edit Order #'.$order->id) }}
                    </p>
                </div>
                <div class="bg-white px-4 py-5 sm:p-6">
                    <form action="{{ route('order.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <div class="sm:col-span-6">
                                    <label for="jenis_joki_id" class="block text-sm font-medium leading-5 text-gray-700">
                                        {{ __('Jenis Joki') }}
                                    </label>
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <select id="jenis_joki_id" name="jenis_joki_id" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                            @foreach ($jenisJokis as $jenisJoki)
                                            <option value="{{ $jenisJoki->id }}" @if ($jenisJoki->id == $order->jenisJoki->id) selected @endif>{{ $jenisJoki->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="jenis_rank_id" class="block text-sm font-medium leading-5 text-gray-700">
                                        {{ __('Jenis Rank') }}
                                    </label>
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <select id="jenis_rank_id" name="jenis_rank_id" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                            @foreach ($jenisRanks as $jenisRank)
                                            <option value="{{ $jenisRank->id }}" @if ($jenisRank->id == $order->jenisRank->id) selected @endif>{{ $jenisRank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Status --}}
                                <div class="sm:col-span-6">
                                    <label for="status" class="block text-sm font-medium leading-5 text-gray-700">
                                        {{ __('Status') }}
                                    </label>
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <select id="status" name="status" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status }}" @if ($status == $order->status) selected @endif>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- End Status --}}
                                <div class="sm:col-span-6">
                                    <label for="payment_method_id" class="block text-sm font-medium leading-5 text-gray-700">
                                        {{ __('Pembayaran') }}
                                    </label>
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <select id="payment_method_id" name="payment_method_id" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                            @foreach ($paymentMethods as $paymentMethod)
                                            <option value="{{ $paymentMethod->id }}" @if ($paymentMethod->id == $order->paymentMethod->id) selected @endif>{{ $paymentMethod->name }}</option>
                                            @endforeach
                                        </select>
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
                            <div class="mt-3 text-sm leading-5 text-gray-500">
                                <p>
                                    {{ __('Note:') }}
                                </p>
                                <p>
                                    {{ __('* Required') }}
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>