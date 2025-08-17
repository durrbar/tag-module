<?php

namespace Modules\Tag\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Ecommerce\Models\Product;
use Modules\Ecommerce\Models\Type;
use Modules\Ecommerce\Traits\TranslationTrait;

class Tag extends Model
{
    use HasUuids;
    use Sluggable;
    use TranslationTrait;

    protected $table = 'tags';

    public $guarded = [];

    protected $appends = ['translated_languages'];

    protected $casts = [
        'image' => 'json',
    ];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function scopeWithUniqueSlugConstraints(Builder $query, Model $model): Builder
    {
        return $query->where('language', $model->language);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_tag');
    }
}
