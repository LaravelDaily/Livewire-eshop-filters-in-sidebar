<div class="flex flex-wrap">
    @foreach($products as $product)
        <div class="w-1/3 p-3">
            <div class="rounded-md">
                <a href="#"><img src="https://placehold.it/700x400" alt=""></a>
                <div class="mt-3">
                    <a href="#" class="text-2xl text-indigo-500 hover:underline">{{ $product->name }}</a>
                </div>
                <h5 class="mt-3">${{ number_format($product->price, 2) }}</h5>
                <p class="mt-3">{{ $product->description }}</p>
            </div>
        </div>
    @endforeach
</div>
