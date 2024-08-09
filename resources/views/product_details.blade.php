@include('templates.header')

<x-navbar />

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->product_image }}" class="img-fluid rounded" alt="{{ $product->product_name }}">
        </div>
        <div class="col-md-6">
            <h1 class="mb-4">{{ $product->product_name }}</h1>
            <h3 class="text-muted mb-3">Price: ${{ number_format($product->product_price, 2) }}</h3>
            <h4 class="mb-4">Quantity: {{ $product->product_quantity }}</h4>
            <p>{{ $product->product_description }}</p>
            <a href="/" class="btn btn-primary mt-3">Back to Products</a>
        </div>
</div>
</div>
<x-featured_product :products="$products" />
<div class="d-flex justify-content-center">
    {{ $products->onEachSide(1)->links() }}
</div>
@include('templates.footer')
