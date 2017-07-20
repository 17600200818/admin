<?php

use Illuminate\Database\Seeder;

class BuyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buyers = factory(\App\Models\Buyer::class)->times(50)->make();
        \App\Models\Buyer::insert($buyers->toArray());
    }
}
