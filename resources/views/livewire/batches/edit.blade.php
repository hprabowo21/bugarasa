<div>
    <x-ui.card class="mb-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Edit Batch: {{ $batch->name }}</h2>
            <div class="text-slate-600">Periode: {{ \Illuminate\Support\Carbon::parse($batch->start_date)->format('d M') }} - {{ \Illuminate\Support\Carbon::parse($batch->end_date)->format('d M Y') }}</div>
        </div>
        @if (session('ok')) <p class="mt-2 text-emerald-700">{{ session('ok') }}</p> @endif
    </x-ui.card>

    <x-ui.card>
        <div class="grid grid-cols-1 md:grid-cols-6 gap-2 mb-4">
            @foreach([1,2,3,4,5] as $d)
            <x-ui.button variant="{{ $day===$d?'primary':'secondary' }}" size="sm" wire:click="loadDay({{ $d }})">{{ \App\Support\DayOfWeek::label($d) }}</x-ui.button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.select label="Lauk 1" wire:model="lauk_1_id">
                <option value="">-</option>
                @foreach($options['lauk'] as $o) <option value="{{ $o->id }}">{{ $o->name }}</option> @endforeach
            </x-ui.select>
            <x-ui.select label="Lauk 2" wire:model="lauk_2_id">
                <option value="">-</option>
                @foreach($options['lauk'] as $o) <option value="{{ $o->id }}">{{ $o->name }}</option> @endforeach
            </x-ui.select>
            <x-ui.select label="Karbo" wire:model="karbo_id">
                <option value="">-</option>
                @foreach($options['karbo'] as $o) <option value="{{ $o->id }}">{{ $o->name }}</option> @endforeach
            </x-ui.select>
            <x-ui.select label="Sayur" wire:model="sayur_id">
                <option value="">-</option>
                @foreach($options['sayur'] as $o) <option value="{{ $o->id }}">{{ $o->name }}</option> @endforeach
            </x-ui.select>
            <x-ui.select label="Buah" wire:model="buah_id">
                <option value="">-</option>
                @foreach($options['buah'] as $o) <option value="{{ $o->id }}">{{ $o->name }}</option> @endforeach
            </x-ui.select>
            <x-ui.select label="Pelengkap" wire:model="pelengkap_id">
                <option value="">-</option>
                @foreach($options['pelengkap'] as $o) <option value="{{ $o->id }}">{{ $o->name }}</option> @endforeach
            </x-ui.select>
        </div>

        <div class="mt-4">
            <x-ui.button wire:click="save">Simpan Menu Hari {{ $this->dayLabel() }}</x-ui.button>
        </div>
    </x-ui.card>
</div>
