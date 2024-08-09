<div class="container">
    <h1 class="text-center mt-5 mb-5">Featured Products</h1>

    <div class="row justify-content-center">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 mb-2">
                <div class="card f-card mx-auto shadow-lg" style="width: 30rem;">
                    <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}" style="height: 8rem; object-fit: cover;">
                    <div class="card-body f-body d-flex flex-column" style="padding: 10px; overflow: hidden;">
                        <h5 class="card-title f-title">{{ $product->product_name }}</h5>
                        <p class="card-text f-text flex-grow-1">{{ $product->product_description }}</p>
                        <p class="card-price">${{ $product->product_price }}</p>
                        <a href="/product-details/{{ $product->id }}" class="btn btn-primary mt-auto">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
