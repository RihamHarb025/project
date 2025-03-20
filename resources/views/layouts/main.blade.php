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

</head>
<body class="bg-amber-50 ">

  <header text-base>

    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <div>
        <a href="#" class="text-lg font-bold">Logo</a>
      </div>

      <nav class="flex gap-16  ml-64">
        <a href="{{route('welcome')}}" class="hover:text-red-900 transition-colors duration-100 ease-in-out font-bold ">Home</a>
        <a href="{{route('recipes.index')}}" class="hover:text-red-900 transition-colors duration-100 ease-in-out font-bold">Recipes</a>
        <a href="#" class="hover:text-red-900 transition-colors duration-100 ease-in-out font-bold">About Us</a>
        <a href="#" class="hover:text-red-900 transition-colors duration-100 ease-in-out font-bold">Contact Us</a>
      </nav>

      <div class="flex items-center gap-5 ">
        <!-- <a href="#"><i class="fa-solid fa-magnifying-glass text-xl"></i></a> -->
        <button class="bg-red-800 text-white rounded-md hover:bg-red-900 px-4 py-2">Sign In</button>
        <button class="bg-gradient-to-r from-yellow-300 via-yellow-200 to-yellow-100 text-black rounded-md  px-4 py-2
        transform transition-all hover:scale-105  animate-glow ">Get Premuim</button>
      </div>

    </div>
  </header>

@yield('content')


</body>
</html>
