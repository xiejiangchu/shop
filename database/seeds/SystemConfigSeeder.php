<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SystemConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = [
            'commany_name'    => '月都商城',
            'commany_tel'     => '021-65982404',
            'commany_email'   => 'xiejiangchu@163.com',
            'commany_phone'   => '15121030453',
            'commany_address' => '宜春市赣西批发市场',
            'commany_logo'    => 'http://www.baidu.com',
            'commany_slogan'  => '新鲜蔬菜，自然生活！',
            'image_base'      => 'http://www.baidu.com',
            'min_order'       => '100',
            'deliver_fee'     => '10',
        ];
        foreach ($configs as $key => $value) {
            # code...
            DB::table('sys_config')->insert([
                'name'       => $key,
                'value'      => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
