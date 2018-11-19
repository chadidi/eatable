<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WeightUnitSeed::class);
        $this->call(FoodSeed::class);
        $this->call(PoisonousFoodSeed::class);
    }
}
