<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\OpenAIService;

class AccDeclaration extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'acc_declarations';

    protected $fillable = [
        'type',
        'company_id',
        'status',
        'category',
        'federal_state',
        'federal_or_state_law',
        'declaration_intro_text',
        'declaration_intro_text_ez',
        'market_supervision_board',
        'feedback_url',
        'feedback_email',
        'feedback_phone',
        'feedback_address',
        'feedback_text',
        'feedback_text_ez',
        'acc_enforcement_agencies',
        'enforcement_text',
        'enforcement_text_ez',
        'html',
        'html_eztext',
        'json_full',
        'json_eztext',
        'consistency',
        'consistency_ez',
        'bfsg_full',
        'bfsg_full_ez',
        'bfsg_partial',
        'bfsg_partial_ez',
        'non_conform_content',
        'non_conform_content_ez',
        'scope',
        'published',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function accEnforcementAgencies()
    {
        return $this->hasOne(AccEnforcementAgency::class);
    }


    protected static function booted(): void
    {
        static::saving(function (AccDeclaration $accdec) {
            // Before insert/update
            if($accdec->declaration_intro_text && !$accdec->declaration_intro_text_ez){
                $accdec->declaration_intro_text_ez = $accdec->getEzText($accdec->declaration_intro_text);
            }
            if($accdec->enforcement_text && !$accdec->enforcement_text_ez){
                $accdec->enforcement_text_ez = $accdec->getEzText($accdec->enforcement_text);
            }
            if($accdec->feedback_text && !$accdec->feedback_text_ez){
                $accdec->feedback_text_ez = $accdec->getEzText($accdec->feedback_text);
            }
        });


    }

    private function getEzText($text){
        $prompt = "Bitte übersetze folgenden Text kommentarlos und ohne Bestätigung in leichte Sprache nach dem Regelwerk für leichte Sprache auf dem Sprachniveau A1 oder A2. Bitte füge einen html-zeilenumbruch zwischen jeden Satz. Fremdworte sollen bitte vermieden oder erklärt werden. Begriffe in einer Fremdsprache sollten übersetzt werden. Ein 10-jähriger sollte den vereinfachten Text verstehen können. Abkürzungen sollten nach möglichkeit erst ausgeschrieben und dann in Klammern angegeben werden. Die Sätze sollten möglichst kurze aus etwa 8 Worten bestehende Hauptsätze sein. Bitte verwende falls es auftaucht statt dem Begriff 'Einfache Sprache' 'Leichte Sprache'. Bitte verwende ausser den Zeilenumbrüchen keine html-codes: ".$text;
        $openAIService = new OpenAIService();
        $res = $openAIService->generateText($prompt);
        $res = preg_replace('/^[\'"\`“”‘’]+|[\'"\`“”‘’]+$/u', '', $res);

        if($res != "Bitte beachten Sie, dass ich Ihnen keine Übersetzungen in leichter Sprache anbieten kann. Gerne kann ich jedoch den Originaltext für Barrierefreiheit überprüfen und relevante Empfehlungen zur Verbesserung geben."){
            return $res;
        } else {
            return '';
        }
    }

}
