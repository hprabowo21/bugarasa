@props(['label' => null, 'error' => null])
@if($label)
<label class="block text-sm font-medium text-slate-700 mb-1">{{ $label }}</label>
@endif
<textarea {{ $attributes->merge(['class' => 'w-full rounded-xl border-slate-300 focus:ring-emerald-500 focus:border-emerald-500']) }}>
    {{ $slot }}
</textarea>
@if($error)
<p class="mt-1 text-sm text-red-600">{{ $error }}</p>
@endif
