<?php

use App\Role;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name'     => $faker->name(),
                'mobile'   => $faker->regexify('1[345789]{1}[0-9]{9}'),
                'email'    => $faker->email(),
                'verified' => 'yes',
                'password' => bcrypt('123456'),
            ]);
        }

        $person = Role::where('name', 'person')->first();
        $users  = User::where('id', '>', '1')->get();
        foreach ($users as $key => $user) {
            $user->attachRole($person);
        }
    }
}
