<div class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400"><strong>Disabilities</strong></div>
<ul style="list-style-type: none">
@foreach($disabilities as $disability)

    @if($disability == 'Blind')
        <!-- Sighted Keyboard Users -->
        <li class="flex items-center space-x-2">
            <img  src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/sightedKeyboard.png'))) }}" alt="sightedKeyboard" class="w-6 h-6 text-gray-800 dark:text-white"/>
            <span style="padding-bottom: 3px;" class="text-sm">Sighted Keyboard Users</span>
        </li>
    @endif
    @if($disability == 'Blind')
        <!-- Blind -->
        <li class="flex items-center space-x-2">
            <img  src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/blind.png'))) }}" alt="blind" class="w-6 h-6 text-gray-800 dark:text-white"/>
            <span style="padding-bottom: 3px;" class="text-sm">Blind</span>
        </li>
    @endif
    @if($disability == 'Low Vision')
        <!-- Low Vision -->
        <li class="flex items-center space-x-2">
            <img  src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/lowVision.png'))) }}" alt="lowVision" class="w-6 h-6 text-gray-800 dark:text-white"/>
            <span style="padding-bottom: 3px;" class="text-sm">Low Vision</span>
        </li>
    @endif
    @if($disability == 'Deaf')

        <!-- Deaf -->
        <li class="flex items-center space-x-2">
            <img  src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/deaf.png'))) }}" alt="deaf" class="w-6 h-6 text-gray-800 dark:text-white"/>
            <span style="padding-bottom: 3px;" class="text-sm">Deaf</span>
        </li>
    @endif
    @if($disability == 'Deafblind')

        <!-- Deafblind -->
        <li class="flex items-center space-x-2" >
            <img  src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/deafblind.png'))) }}" alt="deafblind" class="w-6 h-6 text-gray-800 dark:text-white"/>
            <span style="padding-bottom: 3px;" class="text-sm">Deafblind</span>
        </li>
    @endif
    @if($disability == 'Mobility')

        <!-- mobility -->
        <li class="flex items-center space-x-2">
            <img  src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/mobility.png'))) }}" alt="mobility" class="w-6 h-6 text-gray-800 dark:text-white"/>
            <span style="padding-bottom: 3px;" class="text-sm">Mobility</span>
        </li>
    @endif
    @if($disability == 'Colorblindness')

        <!-- color blind -->
        <li class="flex items-center space-x-2">
            <img  src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/colorblind.png'))) }}" alt="colorblind" class="w-6 h-6 text-gray-800 dark:text-white"/>
            <span style="padding-bottom: 3px;" class="text-sm">Colour Blind</span>
        </li>
        @endif
        @endforeach
        </ul>
