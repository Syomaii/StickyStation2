@include('templates.header')

<x-navbar />

<div class="container mt-5">
    <h1 class="text-center">My Cart</h1>

    @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <p class="text-center">Your cart is empty.</p>
    @else
        <div class="row justify-content-center">
            @foreach ($cartItems as $item)
                <div class="col-lg-3 col-md-4 mb-2">
                    <div class="card f-card mx-auto shadow-lg" style="width: 30rem; height: 40rem">
                        <img src="{{ asset('storage/' . $item->product->product_image) }}" class="card-img-top" alt="{{ $item->product->product_name }}" style="height: 15rem; object-fit: cover;">
                        <div class="card-body f-body d-flex flex-column" style="padding: 5px; overflow: hidden;">
                            <h5 class="card-title f-title text-center mt-3">{{ $item->product->product_name }}</h5>
                            <p class="card-price text-center">${{ $item->product->product_price }}</p>
                            <p class="card-total-price text-center">Total: ${{ number_format($item->quantity * $item->product->product_price, 2) }}</p> <!-- Calculate and display the total price -->
                            <div class="">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}" min="1" max="500">
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="width: 100%">Update</button>
                                </form>
                                <form action="{{ route('cart.buy', $item->id) }}" method="POST" class="">
                                    @csrf
                                    <button type="submit" class="btn btn-success mt-3" style="width: 100%">Buy</button>
                                </form>
                                <form action="{{ route('cart.delete', $item->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-3" style="width: 100%">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@include('templates.footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your item is safe :)',
                        'error'
                    )
                }
            })
        });
    });
</script>
