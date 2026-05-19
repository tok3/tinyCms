@if (session(\App\Support\ImpersonationManager::IMPERSONATOR_ID))
    <form method="POST" action="{{ route('impersonation.stop') }}" class="mr-2 flex items-center">
        @csrf

        <button
            type="submit"
            class="inline-flex h-9 items-center gap-2 rounded-md bg-amber-400 px-3 text-sm font-semibold text-amber-950 shadow-sm transition hover:bg-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2"
        >
            <x-filament::icon icon="heroicon-o-arrow-left-on-rectangle" class="h-5 w-5" />
            <span>Impersonation beenden</span>
        </button>
    </form>
@endif
