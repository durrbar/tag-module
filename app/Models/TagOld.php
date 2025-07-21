<?php

namespace Modules\Tag\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\Tag as TagsTag;

// use Modules\Tag\Database\Factories\TagFactory;

class TagOld extends TagsTag
{
    use HasFactory;
    use HasUuids;

    /**
     * The table associated with the model.
     */
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TagFactory
    // {
    //     // return TagFactory::new();
    // }
}
