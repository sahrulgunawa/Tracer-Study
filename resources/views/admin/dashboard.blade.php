@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Tracer Study</h1>

    <div class="row">
        @foreach($counts as $key => $count)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize">{{ str_replace('_', ' ', $key) }}</h5>
                        <p class="card-text">Total: <strong>{{ $count }}</strong></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
