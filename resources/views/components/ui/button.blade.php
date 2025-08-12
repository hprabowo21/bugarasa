@props(['variant' => 'primary', 'size' => 'md'])
@php
$base = 'inline-flex items-center justify-center font-medium rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2';
$variants = [
    'primary' => 'bg-emerald-600 text-white hover:bg-emerald-700 focus:ring-emerald-500',
    'secondary' => 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 focus:ring-emerald-500',
    'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
];
$sizes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
];
@endphp
<button {{ $attributes->merge(['class' => "{$base} {$variants[$variant]} {$sizes[$size]}"]) }}>
    {{ $slot }}
</button>
