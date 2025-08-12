<div>
    <x-ui.card class="mb-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Customers</h2>
            <x-ui.button wire:click="create">Tambah Customer</x-ui.button>
        </div>
        @if (session('ok')) <p class="mt-2 text-emerald-700">{{ session('ok') }}</p> @endif
    </x-ui.card>

    @if($showForm)
    <x-ui.card class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <x-ui.input label="Nama" wire:model.defer="name"/>
            <x-ui.input label="Phone" wire:model.defer="phone"/>
            <x-ui.textarea label="Notes" wire:model.defer="notes"></x-ui.textarea>
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
                    <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Phone</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </x-slot:head>
            @foreach($customers as $c)
            <tr class="hover:bg-slate-50">
                <td class="px-4 py-2">{{ $c->name }}</td>
                <td class="px-4 py-2">{{ $c->phone }}</td>
                <td class="px-4 py-2 text-right space-x-2">
                    <x-ui.button size="sm" variant="secondary" wire:click="edit({{ $c->id }})">Edit</x-ui.button>
                    <x-ui.button size="sm" variant="danger" wire:click="delete({{ $c->id }})">Hapus</x-ui.button>
                </td>
            </tr>
            @endforeach
        </x-ui.table>
        <div class="mt-3">{{ $customers->links() }}</div>
    </x-ui.card>
</div>
