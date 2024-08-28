<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use URL;


class MenuItem extends Model
{
    use HasFactory, sluggable;

    protected $fillable = [
        'name',
        'type',
        'lang',
        'page_id',
        'parent_id',
        'url',
        'slug',
        ''
    ];

    protected static function boot()
    {
        parent::boot();


        // Beim Erstellen eines neuen Menüeintrags
        static::creating(function ($item) {
            // Bestimme die höchste Order-Nummer für die gegebene parent_id
            $maxOrder = self::where('parent_id', $item->parent_id)->max('order');

            // Setze die Order des neuen Eintrags auf maxOrder + 1
            $item->order = $maxOrder + 1;
        });

        // Beim Aktualisieren eines Menüeintrags
        static::updating(function ($item) {
            // Prüfe, ob die parent_id geändert wurde
            if ($item->isDirty('parent_id'))
            {
                // Bestimme die höchste Order-Nummer für die neue parent_id
                $maxOrder = self::where('parent_id', $item->parent_id)->max('order');

                // Setze die Order des aktualisierten Eintrags auf maxOrder + 1
                $item->order = $maxOrder + 1;
            }
        });

        static::updating(function ($model) {

            if(isset($model->name))
            {
            \Redirect::route('filament.admin.resources.admin.menu-items.edit', $model->id);
            }
        });
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order', 'asc');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function getParentDisplayNameAttribute()
    {
        return $this->parent ? $this->parent->name : 'Top Level';
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }


    // Methode, um eine hierarchisch strukturierte Sammlung zurückzugeben
    public static function getStructured()
    {
        // Hole alle Top-Level-Menüeinträge
        $topLevelItems = self::with('children')->whereNull('parent_id')->orderBy('order')->get();

        return $topLevelItems;
    }

    /**
     * Gibt den vollständigen Pfad inklusive des Slugs der Seite zurück, falls vorhanden.
     *
     * @return string
     */
    public function getFullPathAttribute()
    {
        $path = [];
        $current = $this;

        // Sammelt alle übergeordneten Namen bis zur Wurzel
        while ($current->parent !== null)
        {
            array_unshift($path, $current->parent->slug);
            $current = $current->parent;
        }

        // Überprüft, ob eine page_id vorhanden ist und fügt den Slug der Seite hinzu
        // Andernfalls wird der Slug des aktuellen Menüpunkts verwendet
        if ($this->page_id && $this->page)
        {
            $path[] = $this->page->slug; // Annahme: $this->page->slug gibt den Slug der Seite zurück
        }
        else
        {
            // Fügt den Namen des aktuellen Menüpunkts hinzu, wenn keine page_id vorhanden ist
            $path[] = $this->slug;
        }

        return implode('/', $path); // Verbindet die Elemente des Arrays mit '/' und generiert eine URL

    }

    /**
     * Gibt den vollständigen Pfadnamen des Menüpunkts zurück.
     *
     * @return string
     */
    public function _getFullPathAttribute()
    {
        $path = [];
        $current = $this;

        while ($current !== null)
        {
            array_unshift($path, $current->name); // Fügt den Namen am Anfang des Arrays ein
            $current = $current->parent; // Geht zum übergeordneten Element über
        }

        return implode('->', $path); // Verbindet die Elemente des Arrays mit einem Punkt
    }

}
