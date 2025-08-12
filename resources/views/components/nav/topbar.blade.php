<div class="flex items-center justify-between p-4 bg-white shadow">
    <div class="text-lg font-semibold">
        {{ $slot }}
    </div>
    <div class="flex items-center gap-4">
        <input type="text" placeholder="Search..." class="rounded-xl border-slate-300 focus:ring-emerald-500 focus:border-emerald-500 text-sm">
        <div class="w-8 h-8 bg-slate-300 rounded-full"></div>
    </div>
</div>
