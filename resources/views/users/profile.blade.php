@extends('layouts.app')

@section('content')
<div class="d-flex flex-column min-vh-100">

    <main class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-bg-light mb-3 no-animation" style="transition: 0;">
                    <div class="card-header">¡Hola {{ Auth::user()->name }}!</div>

                    <div class="card-body">
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Fecha de registro:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
</div>
@endsection