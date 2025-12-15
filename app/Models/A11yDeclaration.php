<?php

namespace App\Models;

use App\Services\OpenAIService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class A11yDeclaration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'a11y_declarations';

    protected $fillable = [
        'company_id',

        // 0 = allgemein (früher acc_declarations)
        // 1 = company-spezifisch (früher acc_comp_declarations)
        'declaration_type',

        'status',
        'category',

        // Bundesland / Geltungsbereich / Rechtsgrundlage
        'federal_state',
        'scope',
        'federal_or_state_law',

        // Einleitungstexte
        'declaration_intro_text',
        'declaration_intro_text_ez',

        // Company-spezifische Beschreibung
        'company_offer',
        'company_offer_ez',

        // Vereinbarkeit & BFSG-Konformität
        'consistency',
        'consistency_ez',
        'bfsg_full',
        'bfsg_full_ez',
        'bfsg_partial',
        'bfsg_partial_ez',
        'non_conform_content',
        'non_conform_content_ez',

        // Feedback-Kanal
        'feedback_url',
        'feedback_email',
        'feedback_phone',
        'feedback_address',
        'feedback_text',
        'feedback_text_ez',

        // Marktüberwachungsbehörde / Durchsetzungsstelle
        'market_supervision_board',                 // aus acc_declarations

        'market_surveillance_board_address',       // aus acc_comp_declarations
        'market_surveillance_board_address_text',
        'market_surveillance_board_address_text_ez',

        // Durchsetzungsstellen-spezifische Felder
        'acc_enforcement_agencies',
        'enforcement_text',
        'enforcement_text_ez',

        // Gerenderte Inhalte / JSON
        'html',
        'html_eztext',
        'json_full',
        'json_eztext',

        // Publish-Status
        'published',
    ];

    protected $casts = [
        'status'                => 'integer',
        'category'              => 'integer',
        'declaration_type'      => 'integer',
        'federal_state'         => 'integer',
        'federal_or_state_law'  => 'integer',
        'published'             => 'boolean',
        'json_full'             => 'array',
        'json_eztext'           => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function isCompanyDeclaration(): bool
    {
        return (int) $this->declaration_type === 1;
    }

    public function isGenericDeclaration(): bool
    {
        return (int) $this->declaration_type === 0;
    }

    /**
     * Automatische Generierung Leichte Sprache.
     */
    protected static function booted(): void
    {
        static::saving(function (A11yDeclaration $decl) {
            // Mapping: Originalfeld => EZ-Feld
            $pairs = [
                'declaration_intro_text'                 => 'declaration_intro_text_ez',
                'company_offer'                          => 'company_offer_ez',

                'consistency'                            => 'consistency_ez',
                'bfsg_full'                              => 'bfsg_full_ez',
                'bfsg_partial'                           => 'bfsg_partial_ez',
                'non_conform_content'                    => 'non_conform_content_ez',

                'feedback_text'                          => 'feedback_text_ez',

                'market_surveillance_board_address_text' => 'market_surveillance_board_address_text_ez',
                'enforcement_text'                       => 'enforcement_text_ez',
            ];

            foreach ($pairs as $source => $target) {
                $decl->generateEzTextIfMissing($source, $target);
            }
        });
    }

    /**
     * Hilfsfunktion: generiert EZ nur, wenn Original vorhanden
     * und EZ-Feld noch leer ist.
     */
    private function generateEzTextIfMissing(string $source, string $target): void
    {
        $sourceText = $this->{$source} ?? null;
        $targetText = $this->{$target} ?? null;

        if (!empty($sourceText) && empty($targetText)) {
            $this->{$target} = $this->getEzText($sourceText);
        }
    }

    /**
     * Ruft OpenAIService auf und bereitet die Antwort auf.
     */
    private function getEzText(string $text): string
    {

        $prompt = "Bitte übersetze folgenden Text kommentarlos und ohne Bestätigung in Leichte Sprache "
            . "nach dem Regelwerk für Leichte Sprache auf dem Sprachniveau A1 oder A2. "
            . "Behalte die Absatzstruktur des Originaltexts exakt bei. "
            . "Ersetze jeden vorhandenen Zeilen- oder Absatzumbruch im Original durch genau einen HTML-Zeilenumbruch (<br>). "
            . "Füge KEINE zusätzlichen <br> ein. "
            . "Schreibe niemals ein Leerzeichen oder sonstige Zeichen direkt nach <br>. "
            . "Fremdworte sollen vermieden oder erklärt werden. Begriffe in einer Fremdsprache sollten übersetzt werden. "
            . "Ein 10-jähriges Kind sollte den Text verstehen können. "
            . "Abkürzungen sollten möglichst erst ausgeschrieben und dann in Klammern angegeben werden. "
            . "Die Sätze sollen möglichst kurze Hauptsätze sein. "
            . "Bitte verwende, falls es auftaucht, statt 'Einfache Sprache' den Begriff 'Leichte Sprache'. "
            . "Bitte verwende außer <br> keine weiteren HTML-Tags. Text:\n\n"
            . $text;

        $openAIService = new OpenAIService();
        $res = $openAIService->generateText($prompt);

        // Führende/trailende Anführungszeichen entfernen
        $res = preg_replace('/^[\'"\`“”‘’]+|[\'"\`“”‘’]+$/u', '', (string) $res);

        $fallback = "Bitte beachten Sie, dass ich Ihnen keine Übersetzungen in leichter Sprache anbieten kann. "
            . "Gerne kann ich jedoch den Originaltext für Barrierefreiheit überprüfen und relevante Empfehlungen zur Verbesserung geben.";

        if (trim($res) === $fallback) {
            return '';
        }

        return $res;
    }
}
