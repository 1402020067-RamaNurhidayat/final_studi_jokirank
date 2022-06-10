<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Order History') }}
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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->order_code }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->jenis_joki }}</td>
                        <td>{{ $order->jenis_rank }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            {{-- Details --}}
                            <a href="{{ route('order_history.show', $order->id) }}" class="text-blue-500">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>