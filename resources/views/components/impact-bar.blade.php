<div class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400">
    <strong>Impact:</strong>
    <span style="font-family: 'OCR A', monospace;">{{ $impact }}</span>
</div>
<div class="w-full bg-gray-200 rounded-full h-2.5 mb-2 dark:bg-gray-700">
    @if($impact == "Minor")
        <div class="bg-blue-200 h-2.5 rounded-full dark:bg-gray-300" style="width: 25%"></div>
    @elseif($impact == "Moderate")
        <div class="bg-orange-300 h-2.5 rounded-full dark:bg-gray-300" style="width: 45%"></div>
    @elseif($impact == "Serious")
        <div class="bg-red-400 h-2.5 rounded-full dark:bg-gray-300" style="width: 65%"></div>
    @elseif($impact == "Critical")
        <div class="bg-red-600 h-2.5 rounded-full dark:bg-gray-300" style="width: 95%"></div>
    @endif
</div>
