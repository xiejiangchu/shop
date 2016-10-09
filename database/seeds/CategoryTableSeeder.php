<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class CategoryTableSeeder extends Seeder
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
        $files    = $dir->files('veg/back');
        foreach ($files as $index => $file) {
            if (strpos($file, 'cat') !== false && strpos($file, 'txt') !== false) {
                $file_content = file_get_contents($basePath . '/' . $file);
                $json         = json_decode(iconv("utf-16", "utf-8", $file_content), true);
                $categories   = $json['categoryList'];
                foreach ($categories as $index => $category) {
                    DB::table('category')->insert([
                        'id'              => $category['id'],
                        'name'            => $category['name'],
                        'level'           => $category['level'],
                        'order'           => $category['sequence'],
                        'is_delete'       => $category['is_delete'],
                        'is_recommend'    => $category['is_recommend'],
                        'pid'             => $category['pid'],
                        'pic_category'    => $category['pic_category'],
                        'pic_path_big'    => $category['pic_path_big'],
                        'pic_path_little' => $category['pic_path_little'],
                        'created_at'      => Carbon::now(),
                        'updated_at'      => Carbon::now(),
                    ]);
                }
            }
        }
    }
}
