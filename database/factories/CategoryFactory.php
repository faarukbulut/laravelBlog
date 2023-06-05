<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->name;
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "description" => fake()->text,
            "status" => fake()->boolean,
            "feature_status" => fake()->boolean,
            "order" => random_int(0,100),
            "seo_keywords" => Str::slug(fake()->address, ","),
            "seo_description" => fake()->paragraph,
        ];
    }
}
