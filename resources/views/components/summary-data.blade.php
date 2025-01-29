<div class="bg-gray-100 dark:bg-gray-900 p-4 rounded">
    <h4 class="text-md font-bold text-gray-800 dark:text-gray-300 mb-3">Compliance-Daten und Auswirkungen</h4>

    <x-impact-bar :impact="$accessibilityRule->impact" />

    <div class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400">
        <strong>Issue:</strong>
        <span style="font-family: 'OCR A', monospace;">{{ $accessibilityRule->issue_type }}</span>
    </div>

    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
        <li>
            <strong>Code</strong><br>
            <span style="font-family: 'OCR A', monospace;">{{ $accessibilityRule->description }}</span>
        </li>
        <hr>
        <li>
            <strong>Tags<br></strong>
            {!! $accessibilityRule->wcag_tags !!}
        </li>
    </ul>

    <hr class="mb-4 mt-4">

    <x-disabilities-list :disabilities="json_decode($accessibilityRule->disabilities)" />

    <hr class="mb-4 mt-4">

    <x-standard-logos :standards="json_decode($accessibilityRule->standards)" />
</div>
