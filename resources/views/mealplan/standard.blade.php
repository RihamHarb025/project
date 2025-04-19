@extends('layouts.main')

@section('content')
<div class="container py-6">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-3xl overflow-hidden">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-[#fff4cc] via-[#ffd700] to-[#e6ac00] text-black font-semibold px-6 py-4 rounded-t-3xl">
                    <h4 class="mb-0 text-xl flex items-center justify-start"><i class="fas fa-utensils me-3"></i> Standard Meal Plans</h4>
                </div>
                
                <!-- Body Section -->
                <div class="card-body bg-white p-6">
                    <div class="text-center mb-6">
                        <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061" class="img-fluid rounded-3xl mb-4" style="max-height: 220px; object-fit: cover;">
                        <h3 class="text-3xl font-semibold text-green-950">Basic Nutrition Plans</h3>
                        <p class="lead text-gray-600">Enjoy our collection of healthy, balanced recipes.</p>
                    </div>

                    <!-- Upgrade Section -->
                    <div class="border-t pt-6 mt-6">
                        <h5 class="text-xl font-semibold mb-4">Upgrade to Premium for:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-3">
                                <i class="fas fa-check-circle text-success me-3"></i> Chef-designed exclusive recipes
                            </li>
                            <li class="list-group-item py-3">
                                <i class="fas fa-check-circle text-success me-3"></i> Step-by-step video tutorials
                            </li>
                            <li class="list-group-item py-3">
                                <i class="fas fa-check-circle text-success me-3"></i> Weekly shopping lists
                            </li>
                        </ul>

                        <!-- Upgrade Button -->
                        <div class="d-grid mt-5">
                            <a href="{{ route('premium.plans') }}" class="text-center bg-gradient-to-r from-[#fff4cc] via-[#ffd700] to-[#e6ac00] text-white font-semibold px-6 py-3 rounded-2xl shadow-lg transform transition-all hover:scale-105">
                                <i class="fas fa-crown me-2 text-black"></i><span class="text-black">Upgrade to Premium</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
