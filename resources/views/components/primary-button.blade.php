<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-green-900 text-white rounded-full px-6 py-2 hover:bg-green-950 transition duration-300']) }}>
    {{ $slot }}
</button>
