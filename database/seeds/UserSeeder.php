<?php

use App\Role;
use App\User;
use Carbon\Carbon;
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
                'name'       => $faker->regexify('user_[\w\d]{3}'),
                'mobile'     => $faker->regexify('1[345789]{1}[0-9]{9}'),
                'email'      => $faker->email(),
                'lock'       => 0,
                'verified'   => 0,
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $person = Role::where('name', 'person')->first();
        $users  = User::where('id', '>', '1')->get();
        foreach ($users as $key => $user) {
            $user->attachRole($person);
        }
    }
}
