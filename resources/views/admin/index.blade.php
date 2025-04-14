@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
  <div class="flex">
    <!-- Sidebar -->
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

    <!-- Main Content -->
    <main class="flex-1 ml-6">
      <!-- Quick Actions, Analytics, and Membership Cards in a grid layout -->
      <div class="grid grid-cols-3 gap-6 mb-6">
        <!-- Quick Actions -->
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

        <!-- Analytics Cards -->
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

        <!-- Membership Card (New Card for Users and Earnings) -->
        <div class="bg-white p-4 rounded-xl shadow">
          <h4 class="text-gray-700 font-bold mb-4">Membership</h4>
          <div class="space-y-4">
            <!-- Amount of Users Subscribed -->
            <div class="flex justify-between">
              <p class="text-gray-500">Amount of Users Subscribed</p>
              <h3 class="text-2xl font-bold">12,345</h3>
            </div>
            <!-- Amount of Money Earned -->
            <div class="flex justify-between">
              <p class="text-gray-500">Amount of Money Earned</p>
              <h3 class="text-2xl font-bold">$45,678</h3>
            </div>
          </div>
        </div>
      </div>

      <!-- Other sections below -->
      <div class="bg-white p-6 rounded-xl shadow mb-6">
        <h4 class="text-gray-700 font-bold mb-4">Recent Activity</h4>
        <ul class="space-y-4">
          <li>New recipe added: <strong>Chocolate Cake</strong></li>
          <li>User <strong>johndoe@example.com</strong> signed up</li>
          <li>Recipe <strong>Apple Pie</strong> deleted</li>
          <li>Admin action: <strong>Featured</strong> <strong>Vegan Salad</strong></li>
        </ul>
      </div>

      <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="text-gray-700 font-bold mb-4">User Management</h4>
        <table class="w-full text-sm text-left">
          <thead class="text-gray-500">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <tr class="border-t">
              <td>John Doe</td>
              <td>johndoe@example.com</td>
              <td>Admin</td>
              <td><button class="text-red-500 hover:text-red-700">Ban</button></td>
            </tr>
            <tr class="border-t">
              <td>Jane Smith</td>
              <td>janesmith@example.com</td>
              <td>User</td>
              <td><button class="text-blue-500 hover:text-blue-700">Make Admin</button></td>
            </tr>
            <tr class="border-t">
              <td>Michael Brown</td>
              <td>michaelb@example.com</td>
              <td>Admin</td>
              <td><button class="text-yellow-500 hover:text-yellow-700">Unban</button></td>
            </tr>
            <tr class="border-t">
              <td>Emily White</td>
              <td>emilywhite@example.com</td>
              <td>User</td>
              <td><button class="text-red-500 hover:text-red-700">Ban</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
@endsection
