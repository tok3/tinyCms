<x-filament-widgets::widget>
    <x-filament::card>
        <div class="flex flex-col items-center justify-center space-y-4">
            <form method="POST" action="{{ route('sitemap.generate') }}">
                @csrf
                <button type="submit" class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg  fi-btn-color-gray fi-color-gray fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm hidden sm:inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-gray-400 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-gray-300 dark:[input:checked+&amp;]:bg-gray-600 dark:[input:checked+&amp;]:hover:bg-gray-500">
             Generate Sitemap
                </button>

            </form>
        </div>

    </x-filament::card>

</x-filament-widgets::widget>

