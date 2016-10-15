<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * php artisan make:seeder BannerSeeder
     * php artisan db:seed --class=BannerSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(GoodsTableSeeder::class);

        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(SystemConfigSeeder::class);

    }
}
