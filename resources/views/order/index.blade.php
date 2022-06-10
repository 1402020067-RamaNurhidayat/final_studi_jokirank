<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Order') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table-auto w-full border-collapse border-gray-300">
                <thead class="">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemesan</th>
                        <th>Jenis Joki</th>
                        <th>Rank</th>
                        <th>Pembayaran</th>
                        <th>Total Bayar</th>
                        <th>Login</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->jenisJoki->name }}</td>
                        <td>{{ $order->jenisRank->name }}</td>
                        <td>{{ $order->paymentMethod->name }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->loginMethod->name }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('order.show', $order->id) }}" class="text-blue-500">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                            @if ($show_edit)
                            <a href="{{ route('order.edit', $order->id) }}" class="text-blue-500">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>