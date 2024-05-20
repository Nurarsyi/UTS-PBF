<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $categories = ['Egg', 'Oil', 'Flour'];
        $category = $this->faker->randomElement($categories);

        // Daftar merek Egg
        $eggBrands = [
            'Golden Egg',
            'Happy Egg',
            'Vital Farms',
            'Eggland\'s Best',
            'Organic Valley',
            'Farm Fresh',
            'Nellie\'s Free Range',
            'Pete and Gerry\'s',
            'Phil\'s Fresh Eggs',
            'Backyard Eggs'
        ];

        // Daftar merek Oil
        $oilBrands = [
            'Olive Oil',
            'Canola Oil',
            'Sunflower Oil',
            'Coconut Oil',
            'Avocado Oil',
            'Grapeseed Oil',
            'Peanut Oil',
            'Sesame Oil',
            'Corn Oil',
            'Safflower Oil'
        ];

        // Daftar merek Flour
        $flourBrands = [
            'Gold Medal',
            'King Arthur',
            'Bob\'s Red Mill',
            'Pillsbury',
            'White Lily',
            'Arrowhead Mills',
            'Heckers',
            'Robin Hood',
            'Great River',
            'Trader Joe\'s'
        ];

        $name = $category == 'Egg'
            ? $this->faker->randomElement($eggBrands)
            : ($category == 'Oil'
                ? $this->faker->randomElement($oilBrands)
                : $this->faker->randomElement($flourBrands));

        $description = $category == 'Egg'
            ? $this->faker->randomElement([
                'Telur segar berkualitas tinggi.',
                'Telur organik yang sehat dan bergizi.',
                'Telur dari ayam yang dipelihara secara bebas.'
            ])
            : ($category == 'Oil'
                ? $this->faker->randomElement([
                    'Minyak berkualitas tinggi untuk memasak.',
                    'Minyak sehat yang kaya akan nutrisi.',
                    'Minyak dengan rasa yang khas dan lezat.'
                ])
                : $this->faker->randomElement([
                    'Tepung serbaguna untuk berbagai macam masakan.',
                    'Tepung berkualitas tinggi yang menghasilkan tekstur sempurna.',
                    'Tepung organik yang bebas dari bahan kimia.'
                ]));

        return [
            'name' => $name,
            'description' => $description,
            'price' => $this->faker->numberBetween(5000, 100000),
            'image' => $this->faker->imageUrl(640, 480, 'product', true),
            'category_id' => $category == 'Egg' ? 1 : ($category == 'Oil' ? 2 : 3),
            'expired_at' => now()->addDays(12),
            'modified_by' => $this->faker->randomElement(['user@gmail.com', 'arsyi@gmail.com'])
        ];
    }
}