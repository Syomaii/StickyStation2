@include('templates.header')

<x-navbar />

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('products.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search for products...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <h3 class="mb-5">All Items</h3>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $product->product_image) }}" alt="..." class="card-img-top">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <a href="/product/{{ $product->id }}" class="product-name">
                                    <h5 class="fw-bolder ellipsis-title">{{ $product->product_name }}</h5>
                                </a>
                                <h5 class="fw-bolder ellipsis-title">${{ $product->product_price }}</h5>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <button class="btn btn-outline-dark mt-auto add-to-cart" data-id="{{ $product->id }}">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
</section>

@include('templates.footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.status,
                    });
                }
            });
        });
    });
</script>
