<div>
    <x-ui.card class="mb-4">
        <h2 class="text-lg font-semibold">Buat Order</h2>
        @if (session('ok')) <p class="mt-2 text-emerald-700">{{ session('ok') }}</p> @endif
        @if (session('err')) <p class="mt-2 text-red-600">{{ session('err') }}</p> @endif
    </x-ui.card>

    <x-ui.card>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.select label="Customer" wire:model="customer_id">
                <option value="">Pilih customer...</option>
                @foreach($customers as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </x-ui.select>

            <x-ui.select label="Batch" wire:model="batch_id">
                <option value="">Pilih batch...</option>
                @foreach($batches as $b)
                <option value="{{ $b->id }}">{{ $b->name }} ({{ \Illuminate\Support\Carbon::parse($b->start_date)->format('d M') }}-{{ \Illuminate\Support\Carbon::parse($b->end_date)->format('d M') }})</option>
                @endforeach
            </x-ui.select>

            <x-ui.select label="Tipe Order" wire:model="type">
                <option value="FULL_BATCH">FULL_BATCH</option>
                <option value="PER_DAY">PER_DAY</option>
            </x-ui.select>

            @if($type==='PER_DAY')
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Pilih Hari</label>
                <div class="flex flex-wrap gap-2">
                    @foreach([1=>'Senin',2=>'Selasa',3=>'Rabu',4=>'Kamis',5=>'Jumat'] as $k=>$lbl)
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" wire:model="days" value="{{ $k }}" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span>{{ $lbl }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
            @endif

            <x-ui.textarea label="Custom Requests (JSON optional)" wire:model.defer="custom_requests" rows="3"></x-ui.textarea>
            <x-ui.textarea label="Swaps (JSON optional)" wire:model.defer="swaps" rows="3"></x-ui.textarea>
        </div>

        <div class="mt-4">
            <x-ui.button wire:click="save">Buat Order</x-ui.button>
        </div>
    </x-ui.card>
</div>
