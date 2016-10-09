<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i < 5; $i++) {
            DB::table('banner')->insert([
                'tip'        => $faker->name(),
                'url'        => '/banner/banner-' . $i . '.jpg',
                'order'      => $faker->numberBetween($min = 1, $max = 20),
                'is_show'    => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
