<?php

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
        $basePath = base_path();
        $dir      = new Filesystem($basePath);
        $files    = $dir->files('veg');
        foreach ($files as $index => $file) {
            if (strpos($file, 'cat') !== false && strpos($file, 'txt') !== false) {
                $file_content = file_get_contents($basePath . '/' . $file);
                $json         = json_decode(iconv("utf-16", "utf-8", $file_content), true);
                $categories   = $json['categoryList'];
                foreach ($categories as $index => $category) {
                    DB::table('category')->insert([
                        'id'              => $category['id'],
                        'name'            => $category['name'],
                        'order'           => $category['sequence'],
                        'is_delete'       => $category['is_delete'],
                        'is_recommend'    => $category['is_recommend'],
                        'pid'             => $category['pid'],
                        'pic_category'    => $category['pic_category'],
                        'pic_path_big'    => $category['pic_path_big'],
                        'pic_path_little' => $category['pic_path_little'],
                    ]);
                }
            }
        }
    }
}
