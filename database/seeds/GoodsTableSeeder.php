<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker    = Faker::create();
        $basePath = base_path();
        $dir      = new Filesystem($basePath);
        $files    = $dir->files('veg');
        foreach ($files as $index => $file) {
            if (strpos($file, 'cat') === false && strpos($file, 'txt') !== false) {
                $file_content = file_get_contents($basePath . '/' . $file);
                $json         = json_decode(iconv("utf-16", "utf-8", $file_content), true);
                $products     = $json['productList'];
                if (!empty($products) && count($products) > 0) {
                    foreach ($products as $index => $product) {
                        DB::table('goods')->insert([
                            'id'             => $product['id'],
                            'NO'             => 'NO' . $faker->ean8,
                            'name'           => $product['name'],
                            'category_id1'   => $product['category_id'],
                            'category_id2'   => $product['category_id2'],
                            'is_remain'      => $product['is_remain'] == 'N' ? 0 : 1,
                            'is_online'      => $product['is_online'] == 'N' ? 0 : 1,
                            'is_active'      => $product['is_active'] == 'N' ? 0 : 1,
                            'is_rough'       => $product['is_rough'] == 'N' ? 0 : 1,
                            'is_promote'     => 0,

                            'order'          => $product['sequence'],
                            'weight'         => $product['weight'],
                            'order_quantity' => $product['order_quantity'],
                            'max_quantity'   => $product['max_quantity'],
                            'market_price'   => $product['in_price'],
                            'shop_price'     => $product['price'],
                            'promote_price'  => $product['price'],

                            'remain'         => $product['remain'],
                            'sale_num'       => $product['sale_num'],
                            'quanlity'       => $faker->numberBetween($min = 1, $max = 10),

                            'unit'           => $product['unit'],
                            'unit_sell'      => empty($product['unit_sell']) ? 0 : $product['unit_sell'],
                            'unitDesc'       => $faker->sentences($nb = 1, $asText = true),

                            'thumb'          => $product['logo'],
                            'src'            => $product['logo'],
                            'place'          => "宜春",
                            'summary'        => $product['summary'],
                            'notice'         => $product['notice'],
                            'description'    => null,
                        ]);

                    }
                }

            }
        }
    }

    public function getCIty()
    {

    }

}
