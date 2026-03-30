<div class="p-5 border border-gray-200 rounded-xl bg-white shadow-sm">

    <div class="flex items-center gap-4 mb-3">
        <img src="/assets/img/produkte/upgrade.svg" class="h-10">

        <div>
            <div class="text-xs font-semibold text-gray-500 uppercase">
                @if($isTrial)
                    Testversion
                @else
                    Limit erreicht
                @endif
            </div>

            <div class="text-xl font-bold text-gray-800">
                Monitoring erweitern
            </div>
        </div>
    </div>

    @if($isTrial)
        <p class="text-gray-600">
            Ihre Testversion ist aktuell auf <strong>{{ $maxUrl }} URLs begrenzt</strong>.

            Erweitern Sie Ihr Paket, um weitere URLs hinzuzufügen und Ihre Website automatisch vollständig zu überwachen.
        </p>
    @else
        <p class="text-gray-600">
            Sie haben das URL-Limit erreicht.
            Erweitern Sie Ihr Paket, um weitere URLs zu erfassen und automatisch zu überwachen.
        </p>
    @endif


    {{-- Empfehlung --}}
    @if(!empty($recommendedPlan))
        <div class="mt-4 p-3 bg-gray-100 rounded-lg text-sm">
            <strong>Empfehlung:</strong><br>
            {{ $recommendedPlan }}
        </div>
    @endif


    {{-- Rabatt --}}
    @if(!empty($coupon))
        <div class="mt-3 p-3 bg-green-100 rounded-lg text-sm">
            <strong>Rabattcode:</strong> {{ $coupon }}
        </div>
    @endif

</div>
