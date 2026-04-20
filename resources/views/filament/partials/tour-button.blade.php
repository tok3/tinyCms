<div
    style="
        position: fixed;
        top: 80px;
        right: 20px;
        z-index: 9999;
    "
>
    <div id="tour-button-wrapper" style="display:none; position: fixed; top: 80px; right: 20px; z-index:9999;">

        <button
            id="start-tour-btn"
            class="text-gray-400 hover:text-gray-700 p-2"
            title="Tour starten"
        >
    <span class="w-5 h-5 block">
        {!! file_get_contents(public_path('assets/icons/tour.svg')) !!}
    </span>
        </button>
    </div>

</div>
