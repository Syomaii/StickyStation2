<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src="/assets/images/logo.png" alt="" class="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          
          
          @if(auth()->check()&& auth()->user()->role === 'admin')
              <li class="nav-item">
                  <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.orders') }}" class="nav-link">Orders</a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.products') }}" class="nav-link">Products</a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.users') }}" class="nav-link">Users</a>
              </li>
          @elseif (auth()->check()&& auth()->user()->role === 'customer')
              <li class="nav-item home-btn">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/products">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/cart">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/order">Purchase History</a>
              </li>
          @elseif (auth()->check()&& auth()->user()->role === 'vendor')
              <li class="nav-item home-btn">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/add_product">Add</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('my-products') }}">My Products</a>
              </li>
          @endif
        </ul>
        <ul class="navbar-nav ms-auto">
          @if (!auth()->check())
            <li class="nav-item">
              <a class="nav-link" href="/login" style="color: green;">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Sign Up</a>
            </li>
          @endif
          @if (auth()->check())
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/profile">{{auth()->user()->name}}</a>
            </li>
          @endif
      </ul>
      </div>
    </div>
  </nav>