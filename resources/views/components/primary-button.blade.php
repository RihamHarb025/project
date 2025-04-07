<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-green-900 dark:bg-green-800 border border-transparent rounded-full font-bold text-xs text-white dark:text-gray-100 uppercase tracking-widest hover:bg-green-950 dark:hover:bg-green-700 focus:bg-green-950 dark:focus:bg-green-700 active:bg-green-950 dark:active:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-950 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
