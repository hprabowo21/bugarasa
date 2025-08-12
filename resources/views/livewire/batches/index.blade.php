<div>
    <x-ui.card class="mb-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Batches</h2>
            <a href="{{ route('batches.edit', optional($batches->first())->id ?? 0) }}">
                <x-ui.button>Open Batch Terbaru</x-ui.button>
            </a>
        </div>
    </x-ui.card>

    <x-ui.card>
        <x-ui.table class="w-full">
            <x-slot:head>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Nama</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Tanggal</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </x-slot:head>
            @foreach($batches as $b)
            <tr class="hover:bg-slate-50">
                <td class="px-4 py-2">{{ $b->name }}</td>
                <td class="px-4 py-2">{{ \Illuminate\Support\Carbon::parse($b->start_date)->format('d M') }} - {{ \Illuminate\Support\Carbon::parse($b->end_date)->format('d M Y') }}</td>
                <td class="px-4 py-2 text-right">
                    <a href="{{ route('batches.edit',$b->id) }}"><x-ui.button size="sm" variant="secondary">Open</x-ui.button></a>
                </td>
            </tr>
            @endforeach
        </x-ui.table>
    </x-ui.card>
</div>
