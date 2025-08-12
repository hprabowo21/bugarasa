@props(['variant' => 'default'])
@php
$classes = $variant === 'emerald'
    ? 'bg-emerald-100 text-emerald-800'
    : 'bg-slate-100 text-slate-800';
@endphp
<span {{ $attributes->merge(['class' => "px-2 py-0.5 rounded-full text-xs font-medium {$classes}"]) }}>
    {{ $slot }}
</span>
