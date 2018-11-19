<?php

use Illuminate\Database\Seeder;
use App\Poisonous;

class PoisonousFoodSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poisonouses = array(
            1 => ['food_id' => 1, 'is_poisonous' => true],
            2 => ['food_id' => 2, 'is_poisonous' => true],
        );

        foreach ($poisonouses as $key => $p) {
            $poisonous = new Poisonous();
            $poisonous->id = $key;
            $poisonous->food_id = $p['food_id'];
            $poisonous->is_poisonous = $p['is_poisonous'];
            $poisonous->save();
        }
    }
}
