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
                <a href="#" class=" bg-green-900 rounded-md text-white p-2 view-plan-btn hover:bg-green-950"
                data-name="{{ $plan['name'] }}"
                data-image="{{ $plan['image'] }}"
                data-description="{{ $plan['description'] }}"
                data-features='@json($plan["features"])'>
                View Plan <i class="fas fa-arrow-right ms-2"></i>
                </a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div id="planModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full p-6 relative">
    <button id="closeModal" class="absolute top-4 right-4 text-gray-600 hover:text-black text-2xl">&times;</button>
    <h2 id="modalTitle" class="text-3xl font-bold text-green-950 mb-4"></h2>
    <img id="modalImage" class="w-full h-64 object-cover rounded-lg mb-4" />
    <p id="modalDescription" class="text-gray-600 mb-4"></p>
    <ul id="modalFeatures" class="list-disc list-inside mb-4 text-sm text-gray-800"></ul>
    <p class="text-right text-lg font-semibold text-green-950">Price: $<span id="modalPrice"></span></p>
  </div>
</div>

<script>
$(document).ready(function () {
  $('.view-plan-btn').click(function (e) {
    e.preventDefault();

    const name = $(this).data('name');
    const image = $(this).data('image');
    const description = $(this).data('description');
    const price = $(this).data('price');
    const features = $(this).data('features');

    $('#modalTitle').text(name);
    $('#modalImage').attr('src', image);
    $('#modalDescription').text(description);
    $('#modalPrice').text(price);

    let featureList = $('#modalFeatures');
    featureList.empty();
    features.forEach(f => {
      featureList.append(`<li>${f}</li>`);
    });
    $('#planModal').removeClass('hidden').hide().fadeIn(200);
  });
  $('#closeModal').click(function () {
    $('#planModal').fadeOut(200, function () {
      $(this).addClass('hidden');
    });
  });

  $('#planModal').click(function (e) {
    if (e.target.id === 'planModal') {
      $(this).fadeOut(200, function () {
        $(this).addClass('hidden');
      });
    }
  });
});
</script>

@endsection