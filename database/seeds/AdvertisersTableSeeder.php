<?php

use Illuminate\Database\Seeder;

class AdvertisersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advertisers = factory(\App\Models\Advertiser::class)->times(50)->make();
//        dd($advertisers);
        \App\Models\Advertiser::insert($advertisers->toArray());
    }
}
