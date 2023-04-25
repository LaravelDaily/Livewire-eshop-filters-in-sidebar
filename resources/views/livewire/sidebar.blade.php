<div class="mb-4 col-lg-3 space-y-2 divide-y divide-solid">
    <h1 class="mt-4 text-3xl">Filters</h1>

    <div x-data="{ open: true }">
        <h3 class="mt-2 mb-1 text-2xl">
            <button @click="open = !open" class="flex w-full items-center justify-between text-left">
                Price
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 transform duration-300" :class="{'rotate-180': open}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </button>
        </h3>
        <div x-show="open"
             x-transition.scale.origin.top
             x-transition:enter.duration.500ms
             x-transition:leave.duration.500ms
        >
            @foreach($prices as $index => $price)
                <div>
                    <input type="checkbox" id="price{{ $index }}" value="{{ $index }}" wire:model="selected.prices">
                    <label for="price{{ $index }}">
                        {{ $price['name'] }} ({{ $price['products_count'] }}) </label>
                </div>
            @endforeach
        </div>
    </div>

    <x-filter-group title="Categories" options="categories" selected="selected.categories" />

    <x-filter-group title="Manufacturers" options="manufacturers" selected="selected.manufacturers" />
</div>
