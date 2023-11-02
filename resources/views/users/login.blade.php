@extends('layouts._partials.header')

<main class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts._partials.messages')
            <div class="col-md-6">
                <form method="POST" action="{{ route('user.authenticate') }}" class="p-3 border rounded shadow">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control py-2" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control py-2" required>
                    </div>

                    <button type="submit" class="btn btn-primary py-2">Login</button>
                    <a href="{{ route('user.register') }}" class="btn btn-secondary py-2 ml-2">Register</a>
                </form>
            </div>
        </div>
    </div>
</main>

@extends('layouts._partials.footer')
