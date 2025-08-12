<div>
    <x-ui.card class="mb-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Dishes</h2>
            <x-ui.button wire:click="create">Tambah Dish</x-ui.button>
        </div>
        @if (session('ok'))
            <p class="mt-2 text-emerald-700">{{ session('ok') }}</p>
        @endif
    </x-ui.card>

    @if($showForm)
    <x-ui.card class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.input label="Nama" wire:model.defer="name"/>
            <div>
                <x-ui.select label="Tipe" wire:model.defer="type">
                    <option value="LAUK">LAUK</option>
                    <option value="SAYUR">SAYUR</option>
                    <option value="KARBO">KARBO</option>
                    <option value="BUAH">BUAH</option>
                    <option value="PELENKAP">PELENKAP</option>
                </x-ui.select>
            </div>
            <x-ui.input type="number" label="Yield Default (porsi/1 resep)" wire:model.defer="default_yield_portion"/>
            <x-ui.textarea label="Catatan" wire:model.defer="notes"></x-ui.textarea>
        </div>
        <div class="mt-4 flex gap-2">
            <x-ui.button wire:click="save">Simpan</x-ui.button>
            <x-ui.button variant="secondary" wire:click="$set('showForm', false)">Batal</x-ui.button>
        </div>
    </x-ui.card>
    @endif

    <x-ui.card>
        <x-ui.table class="w-full">
            <x-slot:head>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Nama</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Tipe</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Yield</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </x-slot:head>
            @foreach($dishes as $d)
            <tr class="hover:bg-slate-50">
                <td class="px-4 py-2">{{ $d->name }}</td>
                <td class="px-4 py-2"><x-ui.badge variant="{{ $d->type==='LAUK'?'emerald':'default' }}">{{ $d->type }}</x-ui.badge></td>
                <td class="px-4 py-2">{{ $d->default_yield_portion ?? '-' }}</td>
                <td class="px-4 py-2 text-right space-x-2">
                    <x-ui.button size="sm" variant="secondary" wire:click="edit({{ $d->id }})">Edit</x-ui.button>
                    <x-ui.button size="sm" variant="danger" wire:click="delete({{ $d->id }})">Hapus</x-ui.button>
                </td>
            </tr>
            @endforeach
        </x-ui.table>
        <div class="mt-3">{{ $dishes->links() }}</div>
    </x-ui.card>
</div>
