<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = array(
            "灵泉街道",
            "秀江街道",
            "湛郎街道",
            "珠泉街道",
            "化成街道",
            "官园街道",
            "下浦街道",
            "凤凰街道",
            "金园街道",
            "彬江镇",
            "西村镇",
            "金瑞镇",
            "温汤镇",
            "三阳镇",
            "慈化镇",
            "天台镇",
            "洪塘镇",
            "渥江镇",
            "新坊镇",
            "寨下镇",
            "芦村镇",
            "湖田镇",
            "新田镇",
            "南庙镇",
            "竹亭镇",
            "水江镇",
            "辽市镇",
            "洪江乡",
            "楠木乡",
            "柏木乡",
            "飞剑潭乡",
            "宜春经济开发区管理委员会",
            "袁州区工业园区",
            "宜春市明月山温泉风景名胜区管理局",
            "宜春市宜阳新区管理委员会",
            "农牧实验场",
            "西岭布果园场",
            "明月山采育林场",
            "油茶林场",
        );
        $faker = Faker::create();
        foreach ($regions as $key => $region) {
            DB::table('region')->insert([
                'province'   => "江西省",
                'city'       => '宜春市',
                'district'   => '袁州区',
                'road'       => $region,
                'order'      => $faker->numberBetween($min = 1, $max = 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
