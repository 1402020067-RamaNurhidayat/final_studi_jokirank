
<div class="bg-blue-100 w-48">
  {{-- If route is active --}}
  <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Dashboard" }}
  </a>
  <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.index') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Users" }}
  </a>
  <a href="{{ route('order.index') }}" class="{{ request()->routeIs('order.index') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Pending Order" }}
  </a>
  <a href="{{ route('order.done') }}" class="{{ request()->routeIs('order.done') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Finished Order" }}
  </a>
  <a href="{{ route('service.rank.index') }}" class="{{ request()->routeIs('service.rank.index') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Service: Rank" }}
  </a>
  <a href="{{ route('service.jenis.index') }}" class="{{ request()->routeIs('service.jenis.index') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Service: Jenis" }}
  </a>
</div>