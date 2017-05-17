<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

        factory(App\Recipe::class, 3)->create()->each(function ($recipe) use ($faker) {
    		factory(App\Ingredient::class, 5)
                ->create()
                ->each(function($ingredient) use ($recipe, $faker) {
        			$recipe
        				->ingredients()
        				->attach($recipe->id, [
                            'ingredient_id' => $ingredient->id, 
                            'amount' => $faker->randomDigitNotNull().' шт'
                            ]);
    		});
		});
    }
}