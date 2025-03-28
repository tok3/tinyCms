<x-filament-panels::page>
    <h2 class="text-xl font-bold mb-4">Meine Abonnements</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">Beschreibung</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Nächste Zahlung</th>
            <th class="px-4 py-2">Aktionen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($this->getSubscriptions() as $subscription)
            <tr>
                <td class="border px-4 py-2">{{ $subscription->description }}</td>
                <td class="border px-4 py-2">{{ $subscription->status }}</td>
                <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($subscription->next_payment_date)->format('d.m.Y') }}</td>
                <td class="border px-4 py-2">
                    @if($subscription->status === 'active')
                       {{-- <form method="POST" action="{{ route('filament.pages.subscriptions-page.cancel', $subscription->subscription_id) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Kündigen</button>
                        </form>--}}
                    @else
                        <span class="text-gray-500">Bereits gekündigt</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-filament-panels::page>
