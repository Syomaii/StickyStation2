<!-- resources/views/profile/profile.blade.php -->

@include('templates.header')

<x-navbar />

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="text-center mb-4">My Profile</h1>

                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>
                    <!-- Add more profile fields as needed -->

                    <div class="text-center">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('templates.footer')
