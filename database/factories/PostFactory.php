<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageFile = UploadedFile::fake()->image($this->faker->word . '.jpg', 250, 250);
        $imageFilePath = Storage::disk('public')->put('images', $imageFile);

        return [
            'title' => fake()->jobTitle(),
            'content' => fake()->text(),
            'image' => $imageFilePath
        ];
    }
}
