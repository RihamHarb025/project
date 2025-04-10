<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+IN:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    let isAuthenticated = @json(Auth::check());
</script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header id="header" class="text-green-900 p-3 w-full">
  <div class="flex py-4 px-6 justify-between items-center relative">
    <div class="flex items-center gap-4">
      <a href="#" class="text-lg font-bold">
        <img src="{{ asset('imgs/logo.png') }}" alt="Logo" class="h-16 md:h-20 transition-all duration-300 transform hover:scale-110 hover:translate-y-2">
      </a>
    </div>

    <button id="menu-toggle" class="md:hidden text-green-900">
      <i class="fas fa-bars text-2xl"></i>
    </button>

    <nav id="menu" class="md:flex gap-16 ml-24  hidden">
  <a href="{{ route('welcome') }}" class="group relative font-bold hover:text-green-950 transition-colors duration-200 ease-in-out">
    Home
    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-green-950 transition-all duration-300 group-hover:w-full"></span>
  </a>
  <a href="{{ route('recipes.index') }}" class="group relative font-bold hover:text-green-950 transition-colors duration-200 ease-in-out">
    Recipes
    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-green-950 transition-all duration-300 group-hover:w-full"></span>
  </a>
  <a href="about" class="group relative font-bold hover:text-green-950 transition-colors duration-200 ease-in-out">
    About Us
    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-green-950 transition-all duration-300 group-hover:w-full"></span>
  </a>
  <a href="contact" class="group relative font-bold hover:text-green-950 transition-colors duration-200 ease-in-out">
    Contact Us
    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-green-950 transition-all duration-300 group-hover:w-full"></span>
  </a>
  <a href="{{route('recipes.create')}}" class="group relative font-bold hover:text-green-950 transition-colors duration-200 ease-in-out">
    Create Recipe
    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-green-950 transition-all duration-300 group-hover:w-full"></span>
  </a>
  <a href="mealPlans" class="group relative font-bold hover:text-green-950 transition-colors duration-200 ease-in-out">
    Meal Plans
    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-green-950 transition-all duration-300 group-hover:w-full"></span>
  </a>
  @auth
        <!-- Display User's Profile Image -->
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 group">
    <img src="{{ Auth::user()->profile_image ? asset(Auth::user()->profile_image) : asset('imgs/defaultprofile.png') }}" alt="Profile" class="h-10 w-10 rounded-full border-2 border-transparent group-hover:border-green-950 transition-all duration-300 ease-in-out">
</a>
      @endauth
</nav>
<div id="register-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[9999] hidden">
  <!-- Modal Content -->
  <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6 relative">
    <!-- Close Button -->
    <button id="close-modal" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl font-bold">
      &times;
    </button>

    <!-- Modal Body -->
    <h2 class="text-2xl font-semibold text-center mb-4 text-green-900">You need to be logged in</h2>
    <p class="text-gray-600 text-center mb-6">Please register or log in to continue.</p>

    <div class="flex justify-center gap-4">
      <a href="{{ route('register') }}">
        <button class="bg-green-900 text-white rounded-full px-6 py-2 hover:bg-green-950 transition duration-300">
          Register
        </button>
      </a>
      <a href="{{ route('login') }}">
        <button class="border-2 border-green-900 text-green-900 rounded-full px-6 py-2 hover:bg-green-900 hover:text-white transition duration-300">
          Login
        </button>
      </a>
      
    </div>
  </div>
</div>

    <div class="flex items-center gap-5 ml-auto">
      @guest
        <a href="{{ route('register') }}">
        <button class="bg-green-900 text-white rounded-full hover:bg-green-950 hover:text-white px-6 py-2 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
  Register
</button>
        </a>
        <a href="{{ route('login') }}">
        <button class="text-green-950 rounded-full border-2 border-green-950 hover:bg-green-950 hover:text-white px-6 py-2 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
  Login
</button>
        </a>
      @endguest

      @auth
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button type="button" id="logout-btn" class="bg-green-900 text-white rounded-full hover:bg-green-950 px-6 py-2 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
    Logout
  </button>
        </form>
      @endauth
      <div id="logout-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[9999] hidden">
  <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6 relative">
    <!-- Close Button -->
    <button id="cancel-logout" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl font-bold">
      &times;
    </button>

    <h2 class="text-xl font-semibold text-center mb-4 text-green-900">Confirm Logout</h2>
    <p class="text-gray-700 text-center mb-6">Are you sure you want to log out?</p>

    <div class="flex justify-center gap-4">
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-green-900 text-white rounded-full px-6 py-2 hover:bg-green-950 transition duration-300">
          Yes, Logout
        </button>
      </form>
      <button id="cancel-btn" type="button" class="border-2 border-green-900 text-green-900 rounded-full px-6 py-2 hover:bg-green-900 hover:text-white transition duration-300">
        Cancel
      </button>
    </div>
  </div>
</div>
    </div>
  </div>
</header>



  @yield('content')

  <footer class="bg-white text-white py-16 mt-40 ">
  <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-20 grid grid-cols-1 md:grid-cols-4 gap-12">
    <!-- Logo and Description Section -->
    <div class="flex flex-col items-center text-center mb-10">
  <img src="{{ asset('imgs/logo.png') }}" alt="Tasty Nest Logo" class="w-44 h-auto mb-4">
  <p class="text-lg opacity-80 text-green-900 font-bold max-w-md">
    A collection of simple, delicious, and healthy recipes to inspire your kitchen.
  </p>
</div>

    <!-- Quick Links Section -->
    <div class="flex flex-col text-center md:text-left">
      <h3 class="text-lg font-semibold mb-4 text-green-950 font-bold">Quick Links</h3>
      <ul class="space-y-2">
        <li><a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">Home</a></li>
        <li><a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">Recipes</a></li>
        <li><a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">Premium</a></li>
        <li><a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">Contact</a></li>
      </ul>
    </div>

    <!-- Resources Section -->
    <div class="flex flex-col text-center md:text-left">
      <h3 class="text-lg font-semibold mb-4 text-green-950 font-bold">Resources</h3>
      <ul class="space-y-2">
        <li><a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">Cooking Tips</a></li>
        <li><a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">Meal Planning</a></li>
        <li><a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">Healthy Eating</a></li>
        <li><a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">Newsletter</a></li>
      </ul>
    </div>

    <!-- Social Media Section -->
    <div class="flex flex-col items-center md:items-end">
      <h3 class="text-lg font-semibold mb-4 text-green-950 font-bold">Follow Us</h3>
      <div class="flex space-x-6 justify-center md:justify-end">
        <a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">
          <i class="fab fa-facebook text-2xl"></i>
        </a>
        <a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">
          <i class="fab fa-instagram text-2xl"></i>
        </a>
        <a href="#" class="text-green-900 hover:text-green-950 transition duration-300 font-bold">
          <i class="fab fa-pinterest text-2xl"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Bottom Text -->
  <div class="mt-10 pt-6 text-center text-sm opacity-60 text-green-950 font-bold">
    &copy; 2025 Tasty Nest. All Rights Reserved.
  </div>
</footer>

  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
