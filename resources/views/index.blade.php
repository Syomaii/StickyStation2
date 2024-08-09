@include('templates.header')

<x-navbar />
<x-carousel />

@if (session('status'))
    <div class="alert alert-success mt-3">
        {{ session('status') }}
    </div>
@endif

@if (auth()->check() && auth()->user()->role === 'customer')
    <x-featured_product :products="$products" />
@endif
@if (auth()->check() && auth()->user()->role === 'vendor')
    <x-vendor_product :products="$products" />
@endif

@include('templates.footer')
