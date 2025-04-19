@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-utensils me-2"></i> Standard Meal Plans</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061" class="img-fluid rounded mb-3" style="max-height: 200px;">
                        <h3>Basic Nutrition Plans</h3>
                        <p class="lead">Enjoy our collection of healthy, balanced recipes</p>
                    </div>

                    <div class="border-top pt-3">
                        <h5>Upgrade to Premium for:</h5>
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">
                                <i class="fas fa-check-circle text-success me-2"></i> Chef-designed exclusive recipes
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check-circle text-success me-2"></i> Step-by-step video tutorials
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check-circle text-success me-2"></i> Weekly shopping lists
                            </li>
                        </ul>

                        <div class="d-grid">
                            <a href="{{ route('premium.plans') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-crown me-2"></i> Upgrade to Premium
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection