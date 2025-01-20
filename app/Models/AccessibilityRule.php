<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessibilityRule extends Model
{
    use HasFactory;

    /**
     * Die Tabelle, die mit dem Model verknüpft ist.
     *
     * @var string
     */
    protected $table = 'accessibility_rules';

    /**
     * Die Attribute, die massenweise zugewiesen werden können.
     *
     * @var array
     */
    protected $fillable = [
        'rule_id',              // Eindeutige Regel-ID
        'description',          // Beschreibung der Regel
        'impact',               // Schweregrad
        'tags',                 // Tags (als JSON gespeichert)
        'issue_type',           // Problemtyp
        'act_rule',             // ACT-Regel-Link
        'detail_link',          // Detailseite-Link
        'standards',            // Standards (als JSON gespeichert)
        'disabilities',         // Behinderungen (als JSON gespeichert)
        'how_to_fix_html',      // HTML-Inhalt für HowToFix
        'how_to_fix_text_vars', // Platzhalter-Texte für HowToFix
        'why_important_html',   // HTML-Inhalt für WhyImportant
        'why_important_text_vars', // Platzhalter-Texte für WhyImportant
        'description_html',     // HTML-Inhalt für Description
        'description_text_vars', // Platzhalter-Texte für Description
    ];

    /**
     * Die Attribute, die für Arrays sichtbar gemacht werden sollen.
     *
     * @var array
     */
    protected $casts = [
        'tags' => 'array',
        'standards' => 'array',
        'disabilities' => 'array',
        'how_to_fix_text_vars' => 'array',
        'why_important_text_vars' => 'array',
        'description_text_vars' => 'array',
    ];

    // Relation zu Pa11yAccessibilityIssue
    public function issues()
    {
        return $this->hasMany(Pa11yAccessibilityIssue::class, 'rule_id', 'code');
    }

}
