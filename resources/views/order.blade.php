@include('templates.header')

<x-navbar />

<div class="container mt-5">
    <h1 class="text-center">Purchase History</h1>

    @if($purchaseHistories->isEmpty())
        <p class="text-center">You have no purchase history.</p>
    @else
        <div class="row justify-content-center">
            @foreach ($purchaseHistories as $history)
                <div class="col-lg-3 col-md-4 mb-2">
                    <div class="card f-card mx-auto shadow-lg" style="width: 30rem;">
                        <img src="{{ asset('storage/' . $history->product->product_image) }}" class="card-img-top" alt="{{ $history->product_name }}" style="height: 8rem; object-fit: cover;">
                        <div class="card-body f-body d-flex flex-column" style="padding: 10px; overflow: hidden;">
                            <h5 class="card-title f-title text-center">{{ $history->product_name }}</h5>
                            <p class="card-price text-center">Price: ${{ $history->total_price / $history->quantity }}</p>
                            <p class="card-quantity text-center">Quantity: {{ $history->quantity }}</p>
                            <p class="card-total-price text-center">Total: ${{ $history->total_price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@include('templates.footer')
