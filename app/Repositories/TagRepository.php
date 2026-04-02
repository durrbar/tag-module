<?php

declare(strict_types=1);

namespace Modules\Tag\Repositories;

use Illuminate\Http\Request;
use Modules\Core\Repositories\BaseRepository;
use Modules\Tag\Models\Tag;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

class TagRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'type.slug',
        'language',
    ];

    protected $dataArray = [
        'name',
        'slug',
        'type_id',
        'icon',
        'image',
        'details',
        'language',
    ];

    public function boot(): void
    {
        try {
            $this->pushCriteria(app(RequestCriteria::class));
        } catch (RepositoryException $e) {
            //
        }
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Tag::class;
    }

    public function updateTag(Request $request, Tag $tag): Tag
    {
        $data = $request->only($this->dataArray);
        if (! empty($request->slug) && $request->slug !== $tag['slug']) {
            $data['slug'] = $this->makeSlug($request);
        }
        $tag->update($data);

        return $this->findOrFail($tag->id);
    }
}
