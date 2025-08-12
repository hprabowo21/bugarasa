@extends('layouts.app')

@section('content')
    <x-ui.card class="mb-6">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-semibold">Welcome to Bugarasa</h1>
            <div class="flex items-center gap-2">
                <x-ui.button variant="primary">Primary</x-ui.button>
                <x-ui.button variant="secondary">Secondary</x-ui.button>
                <x-ui.button variant="danger">Danger</x-ui.button>
            </div>
        </div>
        <p class="text-slate-600 mt-2">UI layout & komponen dasar sudah siap digunakan.</p>
    </x-ui.card>

    <x-ui.table class="w-full">
        <x-slot:head>
            <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Nama</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Kategori</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Catatan</th>
            </tr>
        </x-slot:head>
        <tr class="hover:bg-slate-50">
            <td class="px-4 py-2">Contoh Item</td>
            <td class="px-4 py-2"><x-ui.badge variant="emerald">Aktif</x-ui.badge></td>
            <td class="px-4 py-2 text-slate-600">Hanya contoh tampilan tabel</td>
        </tr>
    </x-ui.table>
@endsection
