<?php

namespace App\Filament\Widgets;

use App\Models\PdfExport;
use Filament\Widgets\Widget;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class PdfHashWidget extends Widget implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    protected static string $view = 'filament.widgets.pdf-hash-widget';

    protected int|string|array $columnSpan = '1';

    //public ?TemporaryUploadedFile $uploadedFile = null;
    public $identifier = '';
    public $mode = 'identifier';
    public $uploadedFile = null; // Use string or null to store file ID, avoid serialization issues

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('mode')
                ->label('Mode')
                ->options([
                    'identifier' => 'Enter Document ID',
                    'upload' => 'Upload PDF',
                ])
                ->default('identifier')
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->mode = $state),

            Forms\Components\TextInput::make('identifier')
                ->label('Document ID')
                ->required()
                ->visible(fn ($get) => $get('mode') === 'identifier')
                ->placeholder('e.g., 4C92F')
                ->maxLength(10)
                ->rule('regex:/^[0-9a-zA-Z]+$/'),

            Forms\Components\FileUpload::make('uploadedFile')
                ->label('Upload PDF')
                ->acceptedFileTypes(['application/pdf'])
                ->maxSize(10240) // 10MB
                ->visible(fn ($get) => $get('mode') === 'upload')
                ->required(fn ($get) => $get('mode') === 'upload')
                ->rules(['file', 'mimes:pdf', 'max:10240'])
                ->validationMessages([
                    'required' => 'Bitte laden Sie ein PDF hoch.',
                    'mimes' => 'Nur PDF-Dateien sind erlaubt.',
                    'max' => 'Die Datei darf maximal 10MB groß sein.',
                ])
                ->disk('local')
                ->directory('livewire-tmp')
                ->preserveFilenames()
                /*
                ->afterStateUpdated(function ($state) {
                    Log::info('FileUpload state updated', [
                        'state' => is_array($state) ? $state : ($state ? get_class($state) : 'null'),
                        'size' => $state instanceof TemporaryUploadedFile ? $state->getSize() : null,
                        'path' => $state instanceof TemporaryUploadedFile ? $state->path() : null,
                        'name' => $state instanceof TemporaryUploadedFile ? $state->getClientOriginalName() : null,
                    ]);
                })
                */
                ->dehydrated(false), // Prevent serialization of TemporaryUploadedFile
        ];
    }
    public function submit()
    {
        try {
            Log::info('PdfHashWidget submit called', ['state' => $this->form->getState()]);
            $data = $this->form->getState();
            $mode = $data['mode'] ?? 'identifier';

            if ($mode === 'identifier') {
                $this->handleIdentifierMode($data['identifier']);
            } else {
                $this->handleUploadMode();
            }
        } catch (\Exception $e) {
            Log::error('PdfHashWidget error', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            Notification::make()
                ->title('Error')
                ->body('Ein Fehler ist aufgetreten: ' . e($e->getMessage()))
                ->danger()
                ->send();
        }
    }
    private function handleIdentifierMode(string $identifier): void
    {
        $pdf = PdfExport::where('encoded_id', $identifier)->first();

        if (!$pdf) {
            Log::warning('No document found', ['identifier' => $identifier]);
            Notification::make()
                ->title('Error')
                ->body('Kein Dokument mit der ID: <strong>' . e($identifier) . '</strong> gefunden.')
                ->danger()
                ->send();
            return;
        }

        Log::info('Document found', ['identifier' => $identifier, 'hash' => $pdf->hash]);
        Notification::make()
            ->title('Success')
            ->body('Document Hash: ' . e($pdf->hash))
            ->success()
            ->send();
    }

    private function handleUploadMode(): void
    {
        $file = $this->uploadedFile;

        if (!$file instanceof TemporaryUploadedFile) {
            Log::error('Invalid uploaded file', ['uploadedFile' => $file]);
            Notification::make()
                ->title('Error')
                ->body('Kein gültiges PDF hochgeladen.')
                ->danger()
                ->send();
            return;
        }

        $filePath = $file->path();

        if (!file_exists($filePath)) {
            Log::error('Temporary file not found', ['path' => $filePath]);
            Notification::make()
                ->title('Error')
                ->body('Die hochgeladene Datei konnte nicht gefunden werden.')
                ->danger()
                ->send();
            return;
        }

        $computedHash = hash_file('sha256', $filePath);
        $pdf = PdfExport::where('hash', $computedHash)->first();

        if ($pdf) {
            Log::info('Matching document found', ['hash' => $computedHash, 'encoded_id' => $pdf->encoded_id]);
            Notification::make()
                ->title('Success')
                ->body("Computed Hash: {$computedHash}\nMatches Document ID: {$pdf->encoded_id}")
                ->success()
                ->send();
        } else {
            Log::warning('No matching document found', ['hash' => $computedHash]);
            Notification::make()
                ->title('Success')
                ->body("Computed Hash: {$computedHash}\nNo matching document found.")
                ->warning()
                ->send();
        }

        // Reset only the file-related state
        $this->form->fill(['uploadedFile' => null]);
        $this->uploadedFile = null;
    }


/*
    public function submit()
    {
         try {
            Log::info('PdfHashWidget submit called', ['state' => $this->form->getState()]);
            $data = $this->form->getState();

            if ($data['mode'] === 'identifier') {
                $pdf = PdfExport::where('encoded_id', $data['identifier'])->first();

                if (!$pdf) {
                    Log::warning('No document found', ['identifier' => $data['identifier']]);
                    Notification::make()
                        ->title('Error')
                        ->body('Kein Dokument mit der ID: <strong>' . e($data['identifier']) . '</strong> gefunden.')
                        ->danger()
                        ->send();
                    return;
                }

                Log::info('Document found', ['identifier' => $data['identifier'], 'hash' => $pdf->hash]);
                Notification::make()
                    ->title('Success')
                    ->body('Document Hash: ' . e($pdf->hash))
                    ->success()
                    ->send();
            } else {
                Log::info('Upload mode', ['uploadedFile' => $data['uploadedFile']]);
                if (!$data['uploadedFile'] instanceof TemporaryUploadedFile) {
                    Log::error('Invalid uploaded file', ['uploadedFile' => $data['uploadedFile']]);
                    Notification::make()
                        ->title('Error')
                        ->body('Kein gültiges PDF hochgeladen.')
                        ->danger()
                        ->send();
                    return;
                }

                $file = $data['uploadedFile'];
                $filePath = $file->path(); // e.g., storage/app/livewire-tmp/gA5Q50Oe5gH9B1PzBxPw0OUG1tCzEm-metaWmVydGlmaWthdC5wZGY=-.pdf
                Log::info('Processing uploaded file', [
                    'path' => $filePath,
                    'size' => $file->getSize(),
                    'name' => $file->getClientOriginalName(),
                ]);

                if (!file_exists($filePath)) {
                    Log::error('Temporary file not found', ['path' => $filePath]);
                    Notification::make()
                        ->title('Error')
                        ->body('Die hochgeladene Datei konnte nicht gefunden werden.')
                        ->danger()
                        ->send();
                    return;
                }

                $computedHash = hash_file('sha256', $filePath);

                $pdf = PdfExport::where('hash', $computedHash)->first();

                if ($pdf) {
                    Log::info('Matching document found', ['hash' => $computedHash, 'encoded_id' => $pdf->encoded_id]);
                    Notification::make()
                        ->title('Success')
                        ->body("Computed Hash: {$computedHash}\nMatches Document ID: {$pdf->encoded_id}")
                        ->success()
                        ->send();
                } else {
                    Log::warning('No matching document found', ['hash' => $computedHash]);
                    Notification::make()
                        ->title('Success')
                        ->body("Computed Hash: {$computedHash}\nNo matching document found.")
                        ->warning()
                        ->send();
                }

                // Reset form to clear file input
                $this->form->fill(['uploadedFile' => null]);
            }
        } catch (\Exception $e) {
            Log::error('PdfHashWidget error', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            Notification::make()
                ->title('Error')
                ->body('Ein Fehler ist aufgetreten: ' . e($e->getMessage()))
                ->danger()
                ->send();
        }
    }
        */
}
