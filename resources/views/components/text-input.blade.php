@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => 'mt-1 block w-full p-3 border border-gray-300 rounded-lg bg-white text-black font-bold placeholder:text-stone-700 focus:border-green-950 focus:ring-2 focus:ring-green-950 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-green-950 dark:focus:ring-green-950'
    ]) }}
   
>