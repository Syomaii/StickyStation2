@include('templates.header')

<x-navbar />
<x-carousel />
@if (session('status'))
    <div class="container mt-3">
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    </div>
@endif
<div class="container">
    <h1 class="text-center mt-5 mb-5">My Products</h1>

    <div class="row justify-content-center">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 mb-2 text-center">
                <div class="card f-card mx-auto shadow-lg" style="width: 30rem;">
                    <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}" style="height: 8rem; object-fit: cover;">
                    <div class="card-body f-body d-flex flex-column" style="padding: 10px; overflow: hidden;">
                        <h5 class="card-title f-title">{{ $product->product_name }}</h5>
                        <p class="card-text f-text flex-grow-1">{{ $product->product_description }}</p>
                        <p class="card-price">${{ $product->product_price }}</p>
                        <a href="/edit-product/{{ $product->id }}" class="btn btn-success mt-3">Edit Product</a>
                        <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display:inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger mt-3 delete-btn btn-del">Delete Product</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('templates.footer')

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const form = this.closest('.delete-form');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    });
</script>
