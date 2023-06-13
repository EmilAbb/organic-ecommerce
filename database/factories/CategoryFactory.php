<?php

    namespace Database\Factories;

    use App\Models\Category;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;


    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
     */
    class CategoryFactory extends Factory
    {

        protected $model = Category::class;

        public function definition(): array
        {
            $name = $this->faker->name;
            return [
                'image' => 'category-placeholder.webp',
                'active' => true,
                'parent_id' => array_rand([DB::table('categories')
                    ->where('parent_id', null)->inRandomOrder()->first()?->id, null]),
                'az' => [
                    'title' => $name,
                    'slug' => Str::slug($name)
                ]
            ];
        }
    }
