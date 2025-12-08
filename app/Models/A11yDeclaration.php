<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class A11yDeclaration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'a11y_declarations';

    /**
     * Massen-zuweisbare Attribute.
     */
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

    /**
     * Attribute-Casts.
     */
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

    /**
     * Beziehungen.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Scopes & Helfer.
     */

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


}
