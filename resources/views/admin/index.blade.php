@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
  <div class="flex">

    <aside class="w-64 bg-white rounded-2xl p-6 shadow-md">
      <div class="text-2xl font-bold text-blue-700 mb-8">Admin Panel</div>
      <nav class="space-y-4">
        <a href="#" class="flex items-center space-x-2 text-blue-600 font-semibold">
          <span>📊</span><span>Dashboard</span>
        </a>
        <a href="#" class="block text-gray-600 hover:text-blue-500">Manage Recipes</a>
        <a href="#" class="block text-gray-600 hover:text-blue-500">Manage Users</a>
        <a href="#" class="block text-gray-600 hover:text-blue-500">Analytics</a>
        <a href="#" class="block text-gray-600 hover:text-blue-500">Settings</a>
      </nav>
    </aside>

    <main class="flex-1 ml-6">
      <!-- Quick Actions, Analytics, and Membership Cards in a grid layout -->
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
              <span class="mr-2 text-purple-600">📦</span>
              <button class="text-purple-500 hover:text-purple-700">Add New Recipe</button>
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
              <h3 class="text-2xl font-bold">12,345</h3>
            </div>
            <div class="flex justify-between">
              <p class="text-green-900 font-semibold">Amount of Money Earned</p>
              <h3 class="text-2xl font-bold">$45,678</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-white p-6 rounded-xl shadow mb-6">
        <h4 class="text-green-950 font-bold mb-4 text-2xl">Recent Activity</h4>
        <ul class="space-y-4">
          <li>New recipe added: <strong>Chocolate Cake</strong></li>
          <li>User <strong>johndoe@example.com</strong> signed up</li>
          <li>Recipe <strong>Apple Pie</strong> deleted</li>
          <li>Admin action: <strong>Featured</strong> <strong>Vegan Salad</strong></li>
        </ul>
      </div>

      <div class="bg-white p-6 rounded-xl shadow">
  <h4 class="text-green-950 font-bold mb-4 text-2xl">User Management</h4>

  {{-- Search Bar --}}
  <form action="{{ route('admin.index') }}" method="GET" class="mb-4">
      <input type="text" name="search" id="searchInput" value="{{ request('search') }}" placeholder="Search users..." class="border rounded px-4 py-2 w-1/3" />
      <button type="submit" class="ml-2 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Search</button>
  </form>

  <table class="w-full text-base text-left table-auto" id="usersTable">
    <thead class="text-gray-500 uppercase tracking-wide border-b">
      <tr>
        <th class="py-3 px-4 text-green-950 font-bold text-xl">Name</th>
        <th class="py-3 px-4 text-green-950 font-bold text-xl">Email</th>
        <th class="py-3 px-4 text-green-950 font-bold text-xl">Role</th>
        <th class="py-3 px-4 text-green-950 font-bold text-xl">Actions</th>
      </tr>
    </thead>
    <tbody class="text-gray-700">
      @forelse ($users as $user)
        <tr class="border-b hover:bg-gray-50 transition">
          <td class="py-3 px-4">{{ $user->name }}</td>
          <td class="py-3 px-4">{{ $user->email }}</td>
          <td class="py-3 px-4">
            @if($user->is_admin)
              Admin
            @else
              User
            @endif
          </td>
          <td class="py-3 px-4">
            @if ($user->banned)
              <form action="{{ route('admin.users.unban', $user->id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-orange-500 text-white rounded-lg p-2 hover:bg-orange-700">Unban</button>
              </form>
            @else
              <form action="{{ route('admin.users.ban', $user->id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-orange-500 text-white rounded-lg p-2 hover:bg-orange-700">Ban</button>
              </form>
            @endif
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="py-4 text-center text-gray-500">No users found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

    </main>
  </div>
</div>

<script>
  $(document).ready(function () {

    $('#searchInput').on('keyup', function(e) {
    var searchValue = $(this).val();

    // Prevent form submission
    e.preventDefault();
    console.log('Sending AJAX request with search: ', searchValue);
    $.ajax({
        url: "{{ route('admin.index') }}",
        method: 'GET',
        data: {
            search: searchValue
        },
        success: function(response) {
            $('#usersTable').html(response.html);
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
