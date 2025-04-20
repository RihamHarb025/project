@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
  <div class="flex">

    <aside class="w-64 bg-white rounded-2xl p-6 shadow-md">
      <div class="text-3xl font-bold text-green-950 mb-8">Admin Panel</div>
      <nav class="space-y-4">
      
        <a href="#" class="block text-green-900 hover:text-green-950 font-semibold">Main Dashboard</a>

      </nav>
    </aside>

    <main class="flex-1 ml-6">
     
      <div class="grid grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-4 rounded-xl shadow">
          <h4 class="text-green-950 font-bold mb-4 text-2xl">Quick Actions</h4>
          <ul class="space-y-4">
            <li class="flex items-center">
              <button class="bg-blue-500 text-white rounded-lg p-2 hover:bg-blue-700">Feature/Unfeature Recipe</button>
            </li>
            <li class="flex items-center">
                <a href="{{route('recipes.index')}}">
              <button class="bg-red-500 text-white rounded-lg p-2 hover:bg-red-700">Delete Recipe</button>
                </a>
            </li>
            <li class="flex items-center">
                <a href="{{route('users.index')}}">
              <button class="bg-red-500 text-white rounded-lg p-2 hover:bg-red-700">Delete User</button>
                </a>
            </li>
            <li class="flex items-center">
                <a href="{{route('users.index')}}">
              <button class="bg-orange-500 text-white rounded-lg p-2 hover:bg-orange-700">Ban User</button>
                </a>
            </li>
            <li class="flex items-center">
              <button class="bg-green-600 text-white rounded-lg p-2 hover:bg-green-700" id="openModalBtn">Add New Tag/Category</button>
            </li>
            <li class="flex items-center">
            <a href="{{route('recipes.create')}}">
              <button class="bg-purple-500 text-white rounded-lg p-2 hover:bg-purple-700">Add New Recipe</button>
              </a>
            </li>
          </ul>
        </div>
         <!-- Modal -->
         <div id="addTagCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-lg shadow-xl w-[90%] max-w-md">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-semibold">Add Tag or Category</h2>
      <button id="closeModalBtn">&times;</button>
    </div>

    <div class="mb-4">
      <label class="block font-medium mb-1" for="name">Name</label>
      <input type="text" name="name" id="tagCategoryName" class="w-full border rounded p-2" required>
    </div>

    <div class="flex justify-end gap-4">
      <button id="addTagBtn" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Add Tag</button>
      <button id="addCategoryBtn" class="px-4 py-2 rounded bg-purple-600 text-white hover:bg-purple-700">Add Category</button>
    </div>
  </div>
</div>
    


        <div class="bg-white p-4 rounded-xl shadow">
          <h4 class="text-green-950 font-bold mb-4 text-2xl">Analytics</h4>
          <div class="space-y-4">
            <div class="flex justify-between">
              <p class="text-green-900 font-semibold">Total Users</p>
              <h3 class="text-2xl text-green-950 font-bold">{{ number_format($totalUsers) }}</h3>
            </div>
            <div class="flex justify-between">
              <p class="text-green-900 font-semibold">Total Recipes</p>
              <h3 class="text-2xl text-green-950 font-bold">{{ $totalRecipes }}</h3>
            </div>
            <div class="flex justify-between">
              <p class="text-green-900 font-semibold">Featured Recipes</p>
              <h3 class="text-2xl text-green-950 font-bold">12</h3>
            </div>
            <div class="flex justify-between">
              <p class="text-green-900 font-semibold">Most Liked Recipe</p>
              <h3 class="text-2xl text-green-950 font-bold"> {{ $mostLikedRecipe ? $mostLikedRecipe->title : 'No recipes yet' }}</h3>
            </div>
          </div>
        </div>
        
        <div class="bg-white p-4 rounded-xl shadow">
          <h4 class="text-green-950 font-bold mb-4 text-2xl">Membership</h4>
          <div class="space-y-4">
            <div class="flex justify-between">
              <p class="text-green-900 font-semibold">Amount of Users Subscribed</p>
              <h3 class="text-2xl font-bold">{{$totalPaidUsers}}</h3>
            </div>
            <div class="flex justify-between">
              <p class="text-green-900 font-semibold">Amount of Money Earned</p>
              <h3 class="text-2xl font-bold">{{$totalRevenue}} $</h3>
            </div>
          </div>
        </div>
      </div>


      <div class="bg-white p-6 rounded-xl shadow mb-6">
  <h4 class="text-green-950 font-bold mb-4 text-2xl">Recent Activity</h4>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <!-- Recent Recipes -->
    <div>
  <h5 class="text-lg font-semibold text-green-800 mb-2">Recent Recipes</h5>
  <ul class="space-y-2 text-sm text-gray-700">
    @forelse ($recentRecipes as $recipe)
      <li>
        New recipe added: 
        <strong>{{ $recipe->title }}</strong> by 
        <span class="text-green-700 font-medium">{{ $recipe->user->name }}</span>
      </li>
    @empty
      <li>No recent recipes</li>
    @endforelse
  </ul>
</div>

    <!-- Recent Users -->
    <div class="ml-10">
  <h5 class="text-lg font-semibold text-green-800 mb-2">Recent Users</h5>
  <ul class="space-y-2 text-sm text-gray-700">
    @foreach($recentUsers as $user)
      <li>User <strong>{{ $user->username }}</strong> signed up</li>
    @endforeach
  </ul>
</div>

    <!-- Recent Comments -->
    <div class="ml-5">
  <h5 class="text-lg font-semibold text-green-800 mb-2">Recent Comments</h5>
  <ul class="space-y-2 text-sm text-gray-700">
    @foreach($recentComments as $comment)
      <li>
        <strong>{{ $comment->user->name }}</strong> commented on 
        <strong>{{ $comment->recipe->title }}</strong>
        <em class="block text-xs text-gray-500">"{{ Str::limit($comment->body, 50) }}"</em>
      </li>
    @endforeach
  </ul>
</div>


  </div>
</div>

<div class="bg-white p-6 rounded-xl shadow">
  <h4 class="text-green-950 font-bold mb-4 text-2xl">User Management</h4>

  {{-- Search Bar --}}
  <form action="{{ route('admin.index') }}" method="GET" class="mb-4">
      <input type="text" name="search" id="searchInput" value="{{ request('search') }}" placeholder="Search users..." class="border rounded px-4 py-2 w-1/3" />
  </form>

  <table class="w-full text-base text-left table-auto" id="usersTable">
    <thead class="text-gray-500 border-b">
      <tr>
        <th class="py-3 px-4 text-green-950 font-bold text-xl">Name</th>
        <th class="py-3 px-4 text-green-950 font-bold text-xl">Email</th>
        <th class="py-3 px-4 text-green-950 font-bold text-xl">Role</th>
        <th class="py-3 px-4 text-green-950 font-bold text-xl">Actions</th>
      </tr>
    </thead>
    <tbody class="text-gray-700">
      {{-- Include the partial for displaying user rows --}}
      @include('admin.partials.users-table',['users' => $users])
    </tbody>
  </table>
</div>


<br></br>
<div class="bg-white p-6 rounded-xl shadow">
    <h4 class="text-3xl font-bold mb-4">Contact Messages</h2>
    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-white-800 text-green-950 font-semibold text-xl">
            <tr>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Message</th>
                <th class="p-2">Sent At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $msg)
                <tr class="border-t border-gray-200">
                    <td class="p-2">{{ $msg->name }}</td>
                    <td class="p-2">{{ $msg->email }}</td>
                    <td class="p-2">{{ $msg->message }}</td>
                    <td class="p-2">{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </main>
  </div>
</div>

<script>
  $(document).ready(function () {

    $('#searchInput').on('keyup', function () {
        var query = $(this).val();

        $.ajax({
            url: "{{ route('users.index') }}",
            type: "GET",
            data: { search: query },
            success: function (data) {
                $('#usersTableWrapper').html(data);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    $('#openModalBtn').on('click', function () {
      $('#addTagCategoryModal').removeClass('hidden');
    });

    $('#closeModalBtn').on('click', function () {
      $('#addTagCategoryModal').addClass('hidden');
    });

    function submitTagOrCategory(type) {
      const name = $('#tagCategoryName').val().trim();
      if (!name) return alert('Please enter a name!');

      const url = type === 'tag' ? '{{ route("tags.store") }}' : '{{ route("categories.store") }}';

      $.ajax({
        url: url,
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          name: name
        },
        success: function (response) {
          alert(`${type.charAt(0).toUpperCase() + type.slice(1)} added successfully!`);
          $('#tagCategoryName').val('');
          $('#addTagCategoryModal').addClass('hidden');
          // Optionally reload or update the page
        },
        error: function (xhr) {
          console.error('Error:', xhr.responseText);
          alert('Something went wrong. Please try again!');
          console.error(xhr.responseText);
        }
      });
    }

    $('#addTagBtn').on('click', function () {
      submitTagOrCategory('tag');
    });

    $('#addCategoryBtn').on('click', function () {
      submitTagOrCategory('category');
    });
  });
</script>

@endsection
