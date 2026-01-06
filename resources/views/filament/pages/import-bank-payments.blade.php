<x-filament::page>

    @if(session('success_message'))
        <div class="my-8 p-8 bg-green-100 border-2 border-green-400 text-green-900 rounded-xl text-center text-lg font-semibold">
            {!! session('success_message') !!}
        </div>
    @endif

    @if(session('error'))
        <div class="my-8 p-8 bg-red-100 border-2 border-red-400 text-red-900 rounded-xl text-center">
            {{ session('error') }}
        </div>
    @endif

    <!-- Upload -->
    <div class="bg-white shadow-sm ring-1 ring-gray-900/5 rounded-xl p-6">
        <h2 class="text-xl font-semibold mb-6">Kontoauszug (CSV) hochladen</h2>

        <form wire:submit.prevent="uploadCsv" class="space-y-4">
            <div class="flex items-end gap-6">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-2">CSV-Datei</label>
                    <input type="file" wire:model="csvFile" accept=".csv" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-600 hover:file:bg-primary-100">
                    @error('csvFile') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-primary-700">
                    <span wire:loading.remove>Datei laden</span>
                    <span wire:loading>Lade...</span>
                </button>
            </div>
        </form>
    </div>

    @if(session()->has('payment_matches'))
        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 rounded-xl p-6 mt-8 overflow-x-auto">
            <h2 class="text-xl font-semibold mb-4">Gefundene Zahlungen ({{ count(session('payment_matches')) }})</h2>

            <form method="POST" action="{{ route('filament.admin.pages.import-bank-payments.confirm') }}">
                @csrf

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Entfernen</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Zahler / Rechnung</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Datum</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Betrag</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Rechnungsbetrag</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Bezahlt markieren</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach(session('payment_matches') as $match)
                        <tr class="{{ $match['perfect_match'] ? 'bg-green-50' : '' }}">
                            <td class="px-4 py-3 text-sm font-medium">{{ $match['row_number'] }}</td>
                            <td class="px-4 py-3 text-center">
                                <input type="checkbox" name="remove[]" value="{{ $match['row_number'] }}">
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="font-medium">{{ $match['company_name'] }}</div>

                                @if($match['invoice_id'])
                                    @php $invoice = \App\Models\Invoice::find($match['invoice_id']); @endphp
                                    <a href="{{ \App\Filament\Resources\Shared\InvoiceResource::getUrl('edit', ['record' => $invoice]) }}" target="_blank" class="inline-block mt-1 text-primary-600 hover:text-primary-800 font-medium underline">
                                        [{{ $match['invoice_number'] }}]
                                        @if($match['already_paid'])
                                            <span class="text-red-600 text-xs ml-2">(bereits bezahlt)</span>
                                        @endif
                                    </a>
                                @endif

                                @if(!empty($match['suggested_invoice_ids']))
                                    @php $suggestions = \App\Models\Invoice::whereIn('id', $match['suggested_invoice_ids'])->get(); @endphp
                                    <div class="mt-3 text-sm border-l-4 border-amber-400 pl-3">
                                        <div class="font-semibold text-amber-700 mb-1">
                                            {{ $suggestions->count() == 1 ? 'Offene Rechnung der Firma:' : 'Offene Rechnungen der Firma:' }}
                                        </div>
                                        <div class="space-y-1">
                                            @foreach($suggestions as $suggestion)
                                                @php $amount_match = abs($match['betrag_float'] - $suggestion->total_gross) < 0.01; @endphp
                                                <div class="flex items-center gap-3 text-sm">
                                                    <a href="{{ \App\Filament\Resources\Shared\InvoiceResource::getUrl('edit', ['record' => $suggestion]) }}" target="_blank" class="text-primary-600 hover:underline font-medium">
                                                        [{{ $suggestion->invoice_number }}]
                                                    </a>
                                                    <span class="text-xs {{ $amount_match ? 'text-green-600 font-bold' : 'text-gray-600' }}">
                                                            {{ number_format($suggestion->total_gross, 2, ',', '.') }} €
                                                            @if($amount_match) ← Betrag passt genau! @endif
                                                        </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if(!$match['invoice_id'] && empty($match['suggested_invoice_ids']))
                                    <span class="text-gray-500 text-xs italic">Keine passende Rechnung gefunden</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $match['buchungsdatum'] }}</td>
                            <td class="px-4 py-3 text-sm text-right font-medium">{{ $match['betrag'] }} €</td>
                            <td class="px-4 py-3 text-sm text-right">
                                @if($match['invoice_id'] && !($match['already_paid'] ?? false))
                                    @php $invoice = \App\Models\Invoice::find($match['invoice_id']); @endphp
                                    {{ number_format($invoice->total_gross, 2, ',', '.') }} €
                                    @if(!$match['perfect_match'])
                                        <span class="text-red-600 text-xs block">≠ Betrag abweichend</span>
                                    @endif
                                @else
                                    —
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if($match['perfect_match'] && !($match['already_paid'] ?? false))
                                    <input type="checkbox" name="pay[{{ $match['invoice_id'] }}]" value="{{ $match['buchungsdatum'] }}" checked>
                                @elseif($match['invoice_id'] && !($match['already_paid'] ?? false))
                                    <input type="checkbox" name="pay[{{ $match['invoice_id'] }}]" value="{{ $match['buchungsdatum'] }}">
                                @else
                                    —
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mt-8 text-right">
                    <button type="submit" class="inline-flex items-center px-8 py-3 bg-success-600 text-white rounded-lg font-semibold hover:bg-success-700 transition shadow-md">
                        Markierte Zahlungen bestätigen & Rest-CSV erzeugen
                    </button>
                </div>
            </form>
        </div>
    @endif
</x-filament::page>
