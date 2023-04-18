<div class="col-lg-3 mb-4">
    <h1 class="mt-4 text-4xl">Filters</h1>

    <h3 class="mt-2 mb-1 text-3xl">Price</h3>
    @foreach($prices as $index => $price)
        <div>
            <input type="checkbox" id="price{{ $index }}" value="{{ $index }}" wire:model="selected.prices">
            <label for="price{{ $index }}">
                {{ $price['name'] }} ({{ $price['products_count'] }})
            </label>
        </div>
    @endforeach

    <h3 class="mt-2 mb-1 text-3xl">Categories</h3>
    @foreach($categories as $index => $category)
        <div>
            <input type="checkbox" id="category{{ $index }}" value="{{ $category->id }}" wire:model="selected.categories">
            <label for="category{{ $index }}">
                {{ $category['name'] }} ({{ $category['products_count'] }})
            </label>
        </div>
    @endforeach

    <h3 class="mt-2 mb-1 text-3xl">Manufacturers</h3>
    @foreach($manufacturers as $index => $manufacturer)
        <div>
            <input type="checkbox" id="manufacturer{{ $index }}" value="{{ $manufacturer->id }}" wire:model="selected.manufacturers">
            <label for="manufacturer{{ $index }}">
                {{ $manufacturer['name'] }} ({{ $manufacturer['products_count'] }})
            </label>
        </div>
    @endforeach
</div>
