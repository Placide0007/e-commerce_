<a href="{{ route('products.show', $product) }}">
    <div class="card">
        <div class="card-header">
            <p>New</p>
        </div>
        <div class="card-body">
            <img src="{{ asset('images/' . $product->product_image) }}" alt="{{ $product->product_name }}">
        </div>
        <div class="card-footer">
            <p class="product-name">{{ $product->product_name }}</p>
            <x-button class="btn-primary price" label="{{ $product->product_price }} Ar" />
        </div>
    </div>
</a>
