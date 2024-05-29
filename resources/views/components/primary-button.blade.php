<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex 
                        items-center px-4 py-2 bg-sky-500 border border-transparent
                         rounded-xl font-semibold text-xs text-white
                          hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-900
                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                            focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
