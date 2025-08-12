<aside class="bg-white shadow rounded-r-2xl p-4 min-h-screen">
    <div class="text-lg font-semibold mb-6">Bugarasa</div>
    @php
      $link = fn($path)=> request()->is(trim($path,'/').'*') ? 'text-emerald-600 font-semibold' : 'text-slate-700';
    @endphp
    <nav class="space-y-2">
        <a href="{{ url('/') }}" class="{{ $link('/') }}">Dashboard</a>
        <a href="{{ route('batches.index') }}" class="{{ $link('batches') }}">Batches</a>
        <a href="{{ route('dishes.index') }}" class="{{ $link('dishes') }}">Dishes</a>
        <a href="{{ route('customers.index') }}" class="{{ $link('customers') }}">Customers</a>
        <a href="{{ route('orders.create') }}" class="{{ $link('orders') }}">Orders</a>
    </nav>
</aside>
