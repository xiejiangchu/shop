<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment')->insert([
            'code'       => 'WX',
            'name'       => '微信支付',
            'is_enabled' => 0,
        ]);

        DB::table('payment')->insert([
            'code'       => 'Alipay',
            'name'       => '支付宝',
            'is_enabled' => 0,
        ]);

        DB::table('payment')->insert([
            'code'       => 'Cash',
            'name'       => '货到付款',
            'is_enabled' => 1,
        ]);
    }
}
