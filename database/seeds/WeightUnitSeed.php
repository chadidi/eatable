<?php

use App\WeightUnit;
use Illuminate\Database\Seeder;

class WeightUnitSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = array(
            1 => ['name' => 'gram', 'symbol' => 'g', 'conversion_rate' => 1],
            2 => ['name' => 'ounce ', 'symbol' => 'oz', 'conversion_rate' => 0.035274],
        );

        foreach ($units as $key => $unit) {
            $weightUnit = new WeightUnit();
            $weightUnit->id = $key;
            $weightUnit->name = $unit['name'];
            $weightUnit->symbol = $unit['symbol'];
            $weightUnit->conversion_rate = $unit['conversion_rate'];
            $weightUnit->save();
        }
    }
}
