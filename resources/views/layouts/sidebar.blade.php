
<div class="bg-blue-100 w-48">
  {{-- If route is active --}}
  <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Dashboard" }}
  </a>
  <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Dashboard" }}
  </a>
  <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Dashboard" }}
  </a>
  <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'bg-gray-300' : '' }} text-black text-xl transition-all duration-500 hover:text-white hover:bg-black font-bold p-3 block">
    {{ "Dashboard" }}
  </a>
</div>