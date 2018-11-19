<?php

use App\Food;
use Illuminate\Database\Seeder;

class FoodSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = array(
            1 => [
                'name' => 'Mushroom1', 'min_length' => 1, 'max_length' => 5,
                'weight' => 2, 'weight_unit_id' => 1, 'color' => 'red',
            ],
            2 => [
                'name' => 'Mushroom2', 'min_length' => 4, 'max_length' => 6,
                'weight' => 3, 'weight_unit_id' => 2, 'color' => 'grey',
            ],
        );

        foreach ($foods as $key => $foo) {
            $food = new Food();
            $food->id = $key;
            $food->name = $foo['name'];
            $food->min_length = $foo['min_length'];
            $food->max_length = $foo['max_length'];
            $food->weight = $foo['weight'];
            $food->weight_unit_id = $foo['weight_unit_id'];
            $food->color = $foo['color'];
            $food->save();
        }
    }
}
