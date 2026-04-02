<?php

declare(strict_types=1);

namespace Modules\Tag\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\Tag as TagsTag;

// use Modules\Tag\Database\Factories\TagFactory;

#[Table('tags')]
#[Fillable([])]
class TagOld extends TagsTag
{
    use HasFactory;
    use HasUuids;

    /**
     * The table associated with the model.
     */

    // protected static function newFactory(): TagFactory
    // {
    //     // return TagFactory::new();
    // }
}
