<h3 class="mb-4 font-semibold text-gray-900 dark:text-white">WCAG Level</h3>
<ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    @php
        // Standardmäßig sind alle aktiv (123)
        $selectedLevels = str_split(request()->get('levels', '123'));
        $levelMap = ['1' => 'A', '2' => 'AA', '3' => 'AAA'];
    @endphp

    @foreach ($levelMap as $key => $label)
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center ps-3">
                <input
                    id="level-{{ $label }}"
                    type="checkbox"
                    name="levels[]"
                    value="{{ $key }}"
                    @checked(in_array($key, $selectedLevels))
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                    onchange="handleFilterChange(this)">
                <label for="level-{{ $label }}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    <span class="text-gray-500">WCAG2</span>{{ $label }}
                </label>
            </div>
        </li>
    @endforeach
</ul>

<script>
    function handleFilterChange(checkbox) {
        const url = new URL(window.location.href);
        const selectedCheckboxes = document.querySelectorAll('input[name="levels[]"]:checked');

        // Entferne alle bestehenden 'levels' Parameter
        url.searchParams.delete('levels');

        // Füge die neuen Level-Parameter basierend auf den ausgewählten Checkboxen hinzu
        const selectedLevels = Array.from(selectedCheckboxes).map(cb => cb.value).join('');
        if (selectedLevels) {
            url.searchParams.set('levels', selectedLevels);
        }

        // Seite neu laden mit aktualisierten Parametern
        window.location.href = url.toString();
    }
</script>
<!-- ende filter -->
