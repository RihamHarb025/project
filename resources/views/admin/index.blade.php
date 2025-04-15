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
              <button class="bg-green-600 text-white rounded-lg p-2 hover:bg-green-700">Add New Tag/Category</button>
            </li>
            <li class="flex items-center">
              <span class="mr-2 text-purple-600">📦</span>
              <button class="text-purple-500 hover:text-purple-700">Add New Recipe</button>
            </li>
          </ul>
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
  <table class="w-full text-base text-left table-auto">
    <thead class="text-gray-500 uppercase tracking-wide border-b">
      <tr>
        <th class="py-3 px-4 text-green-950 font-bold mb-4 text-2xl">Name</th>
        <th class="py-3 px-4 py-3 px-4 text-green-950 font-bold mb-4 text-xl">Email</th>
        <th class="py-3 px-4 py-3 px-4 text-green-950 font-bold mb-4 text-xl">Role</th>
        <th class="py-3 px-4 py-3 px-4 text-green-950 font-bold mb-4 text-xl">Actions</th>
      </tr>
    </thead>
    <tbody class="text-gray-700">
      <tr class="border-b hover:bg-gray-50 transition">
        <td class="py-3 px-4">John Doe</td>
        <td class="py-3 px-4">johndoe@example.com</td>
        <td class="py-3 px-4">Admin</td>
        <td class="py-3 px-4">
          <button class="text-red-500 hover:text-red-700 font-medium">Ban</button>
        </td>
      </tr>
      <tr class="border-b hover:bg-gray-50 transition">
        <td class="py-3 px-4">Jane Smith</td>
        <td class="py-3 px-4">janesmith@example.com</td>
        <td class="py-3 px-4">User</td>
        <td class="py-3 px-4">
          <button class="text-blue-500 hover:text-blue-700 font-medium">Make Admin</button>
        </td>
      </tr>
      <tr class="border-b hover:bg-gray-50 transition">
        <td class="py-3 px-4">Michael Brown</td>
        <td class="py-3 px-4">michaelb@example.com</td>
        <td class="py-3 px-4">Admin</td>
        <td class="py-3 px-4">
          <button class="text-yellow-500 hover:text-yellow-700 font-medium">Unban</button>
        </td>
      </tr>
      <tr class="border-b hover:bg-gray-50 transition">
        <td class="py-3 px-4">Emily White</td>
        <td class="py-3 px-4">emilywhite@example.com</td>
        <td class="py-3 px-4">User</td>
        <td class="py-3 px-4">
          <button class="text-red-500 hover:text-red-700 font-medium">Ban</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="p-6">
    <h2 class="text-3xl font-bold mb-4">Contact Messages</h2>
    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-green-800 text-white">
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
@endsection
