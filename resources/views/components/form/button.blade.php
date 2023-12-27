<button type="submit"
    {{ $attributes([
        'class' => 'transition-all duration-500 ease-in-out px-3 py-1 bg-primaryColor text-white rounded hover:opacity-85',
    ]) }}>
    {{ $slot }}
</button>
