<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;
use App\Models\Pa11yUrl;

class Pa11yRescanButton extends Component
{
    public $urlId;
    public $standard;

    public function mount($urlId, $standard = '2.1')
    {
        $this->urlId = $urlId;
        $this->standard = $standard;
    }

    public function rescan()
    {
        $this->isScanning = true;

        $url = Pa11yUrl::find($this->urlId);

        if (!$url) {
            session()->flash('error', 'URL nicht gefunden.');
            $this->isScanning = false;
            return;
        }

        if ($this->standard === '2.1') {
            Artisan::call('scan:accessibility-21', [
                'urls' => [$this->urlId],
                '--warnings' => true,
            ]);
        } else {
            Artisan::call('scan:accessibility', [
                'urls' => [$this->urlId],
                '--levels' => 'A,AA,AAA',
            ]);
        }

        session()->flash('success', "Rescan gestartet für {$url->url} (Standard: {$this->standard})");

        $this->isScanning = false;

        // Jetzt korrekt für Livewire in Filament 3
        $this->dispatch('refreshPage');
    }

    public function render()
    {
        return view('livewire.pa11y-rescan-button');
    }
}
