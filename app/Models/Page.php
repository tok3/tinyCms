<?php

namespace App\Models;

use App\Events\PageUpdatedEvent;
use Carbon\Carbon;
use Facades\App\Domain\Render\RenderContent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
//use Laravel\Scout\Searchable;
use Spatie\Tags\HasTags;

/**
 * @property string $title
 * @property string $slug
 * @property string $external_id
 * @property bool $published
 * @property array $blocks
 * @property Carbon $deleted_at
 * @property User $author
 * @property int $author_id
 * @property int $id
 */
class Page extends Model
{
    use HasFactory;
    use HasTags;
    //use Searchable;
    use SoftDeletes;

    protected $guarded = [];

    protected $dispatchesEvents = [
        'updated' => PageUpdatedEvent::class,
    ];

    protected $casts = [
        'blocks' => 'array',
        'meta' => 'json',
        'meta_og' => 'json',
        'meta_twitter' => 'json',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            if (auth()->check()) {
                $model->author_id = auth()->id();
            }

            // Generiere und setze eine UUID für external_id
            $model->external_id = Str::uuid();

        });

        //
        static::saving(function ($model) {

            self::presetMetas($model);

        });
    }

    protected static function presetMetas($model)
    {
        // Zugriff auf das 'meta' Feld als Array
        $meta = $model->meta ?? [];
        $meta_og = $model->meta_og ?? [];
        $meta_twitter = $model->meta_twitter ?? [];

        // Beispiel: Aktualisieren von 'meta_og' und 'meta_twitter' basierend auf 'meta'
        if (!empty($model->title)) {
            $meta['title'] = $meta['title'] ?? $model->title;
            $meta_og['title'] = $meta_og['title'] ?? $model->title;
            $meta_twitter['title'] = $meta_twitter['title'] ??  $model->title;
        }

        // Beispiel: Setzen von 'description' in 'meta_og' und 'meta_twitter', falls leer
        if (!empty($meta['description'])) {
            $meta_og['description'] = $meta_og['description'] ?? $meta['description'];
            $meta_twitter['description'] = $meta_twitter['description'] ?? $meta['description'];
        }

        // Aktualisieren der Felder im Modell
        $model->meta = $meta;
        $model->meta_og = $meta_og;
        $model->meta_twitter = $meta_twitter;

    }
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    /**
     * Determine if the model should be searchable.
     */
   /* public function shouldBeSearchable(): bool
    {

        return $this->published;
    }

    public function setAuthorIdAttribute(){

        $this->attributes['author_id'] = \Auth::user()->id;
    }

    public function toSearchableArray(): array
    {
        $content = RenderContent::handle($this);

        $tags = $this->tags->pluck('name')->implode(',');

        return [
            'id' => $this->id,
            'title' => $this->title,
            'blocks' => $content . $tags,
        ];
    }

    protected function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->with('tags');
    }*/

/*
<meta name="description" content="..." />
<meta name="keywords" content="..." />
<meta name="robots" content="noindex" />
<meta name="robots" content="nofollow" />
<meta name="robots" content="max-snippet:[Anzahl]" />
<meta name="robots" content="max-video-preview:[Sekunden]" />
<meta name="robots" content="max-image-preview:[Einstellung]" />
<meta property="og:title" content="..." />
<meta property="og:image" content="..." />
<meta property="og:type" content="..." />
<meta property="og:url" content="..." />
<meta property="og:site_name" content="..." />
<meta property="og:description" content="..." />
<meta name="twitter:card" content="..." />
<meta name="twitter:title" content="..." />
<meta name="twitter:description" content="..." />
<meta name="twitter:image" content="..." />*/

}
