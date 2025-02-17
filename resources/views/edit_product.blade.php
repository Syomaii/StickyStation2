@include('templates.header')

<x-navbar />

<div class="container d-flex justify-content-center align-items-center min-vh-100 mt-5">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <h1 class="card-title text-center">Edit Product</h1>

                    @if (session('success'))
                        <div class="alert alert-success text-center w-100">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}">
                            @error('product_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_quantity" class="form-label">Product Quantity</label>
                            <input type="number" class="form-control @error('product_quantity') is-invalid @enderror" id="product_quantity" name="product_quantity" value="{{ old('product_quantity', $product->product_quantity) }}">
                            @error('product_quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="number" step="0.01" class="form-control @error('product_price') is-invalid @enderror" id="product_price" name="product_price" value="{{ old('product_price', $product->product_price) }}">
                            @error('product_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_image" class="form-label">Product Image</label>
                            <input type="file" class="form-control @error('product_image') is-invalid @enderror" id="product_image" name="product_image" onchange="previewImage(event)">
                            @error('product_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mt-3">
                                <img id="image_preview" src="{{ $product->product_image ? asset('storage/' . $product->product_image) : '#' }}" alt="Image Preview" style="display: {{ $product->product_image ? 'block' : 'none' }}; max-width: 100%; height: auto;" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="product_description" class="form-label">Product Description</label>
                            <textarea class="form-control @error('product_description') is-invalid @enderror" id="product_description" name="product_description" rows="4">{{ old('product_description', $product->product_description) }}</textarea>
                            @error('product_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_status" class="form-label">Product Status</label>
                            <select class="form-control @error('product_status') is-invalid @enderror" id="product_status" name="product_status">
                                <option value="">Choose...</option>
                                <option value="available" {{ old('product_status', $product->product_status) == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="unavailable" {{ old('product_status', $product->product_status) == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                            </select>
                            @error('product_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_type" class="form-label">Product Type</label>
                            <input type="text" class="form-control @error('product_type') is-invalid @enderror" id="product_type" name="product_type" value="{{ old('product_type', $product->product_type) }}">
                            @error('product_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Update Product</button>
                        </div>
                        
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@include('templates.footer')

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('image_preview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    };

    document.getElementById('delete-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        if (confirm('Are you sure you want to delete this product?')) {
            // If the user confirms the deletion, submit the form with a DELETE request
            fetch(this.action, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => {
                if (response.ok) {
                    // Redirect or perform any other action upon successful deletion
                    window.location.href = '{{ url('/my-products') }}';
                } else {
                    // Handle errors or display a message
                    console.error('Error deleting product');
                }
            }).catch(error => {
                console.error('Error deleting product:', error);
            });
        }
    });
</script>