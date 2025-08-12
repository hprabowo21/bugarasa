<div class="bg-white shadow rounded-r-2xl p-4 min-h-screen">
    <div class="text-lg font-semibold mb-6">Bugarasa</div>
    <nav class="space-y-2">
        <a href="/" class="{{ request()->is('/') ? 'text-emerald-600 font-semibold' : 'text-slate-700' }}">Dashboard</a>
        <a href="/batches" class="{{ request()->is('batches') ? 'text-emerald-600 font-semibold' : 'text-slate-700' }}">Batches</a>
        <a href="/dishes" class="{{ request()->is('dishes') ? 'text-emerald-600 font-semibold' : 'text-slate-700' }}">Dishes</a>
        <a href="/customers" class="{{ request()->is('customers') ? 'text-emerald-600 font-semibold' : 'text-slate-700' }}">Customers</a>
    </nav>
</div>
