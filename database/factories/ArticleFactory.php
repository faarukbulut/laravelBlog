<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->name;
        return [
            "category_id" => random_int(1,10),
            "user_id" => random_int(1,10),
            "name" => $name,
            "slug" => Str::slug($name),
            "body" => fake()->paragraph,
            "status" => fake()->boolean(),
            "tags" => Str::slug(fake()->address, ", "),
            "seo_description" => fake()->paragraph,
            "seo_keywords" => Str::slug(fake()->address, ", "),
            "view_count" => random_int(0,100),
            "like_count" => random_int(0,100),
            "read_time" => random_int(0,2000),
            "publish_date" => fake()->dateTime,
        ];
    }
}
