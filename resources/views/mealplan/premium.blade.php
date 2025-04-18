@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-crown text-warning me-2"></i> Premium Meal Plans</h2>
        <span class="badge bg-success px-3 py-2">
            <i class="fas fa-star me-1"></i> PRO MEMBER
        </span>
    </div>

    <div class="row g-4">
        @foreach($chefPlans as $plan)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ $plan['image'] }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $plan['name'] }}</h5>
                    <p class="card-text text-muted">{{ $plan['description'] }}</p>
                    <ul class="list-group list-group-flush">
                        @foreach($plan['features'] as $feature)
                        <li class="list-group-item small">
                            <i class="fas fa-check text-success me-2"></i> {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="#" class="btn btn-outline-primary w-100">
                        View Plan <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection