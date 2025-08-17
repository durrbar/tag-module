<?php

namespace Modules\Tag\Database\Factories;

use Modules\Tag\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'slug' => $this->faker->unique()->slug,
            'image' => [
                'thumbnail' => $this->faker->imageUrl(100, 100),
                'original' => $this->faker->imageUrl(),
            ],
            'created_at' => $this->faker->dateTimeBetween('-2 years'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}