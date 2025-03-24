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
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+IN:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <header>
    <div class="flex py-4 px-6 justify-between items-center">
      <div class="flex items-center gap-4">
        <a href="#" class="text-lg font-bold">
          <img src="your-logo-url-here.png" alt="Logo" class="h-10">
        </a>
      </div>
      <nav class="flex gap-16 ml-24">
        <a href="{{ route('welcome') }}" class="hover:text-green-950 transition-colors duration-100 ease-in-out font-bold">Home</a>
        <a href="recipes" class="hover:text-green-950 transition-colors duration-100 ease-in-out font-bold">Recipes</a>
        <a href="about" class="hover:text-green-950 transition-colors duration-100 ease-in-out font-bold">About Us</a>
        <a href="contact" class="hover:text-green-950 transition-colors duration-100 ease-in-out font-bold">Contact Us</a>
      </nav>
      
      <!-- Authentication links -->
      <div class="flex items-center gap-5 ml-auto">
        @guest
          <a href="{{ route('register') }}">
            <button class="bg-green-900 text-white rounded-full hover:bg-green-950 px-6 py-2 transition duration-300 ease-in-out">Register</button>
          </a>
          <a href="{{ route('login') }}">
            <button class="text-green-950 rounded-full border-2 border-green-950 hover:bg-green-950 hover:text-white px-6 py-2 transition duration-300 ease-in-out">Login</button>
          </a>
        @endguest
        
        @auth
          <!-- If the user is authenticated, show the logout button -->
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-green-900 text-white rounded-full hover:bg-green-950 px-6 py-2 transition duration-300 ease-in-out">Logout</button>
          </form>
        @endauth
      </div>
    </div>
  </header>

  <!-- Main content area -->
  @yield('content')

  <!-- Custom Scripts -->
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
