<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        category_product
        $csvFile = fopen(base_path("category_product.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                $products =  $this->data($data);
                DB::table('category_product')->insert($products);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }

    private function data($data){
       return $products = array(
            "category_id" => $data[0],
            "product_id" => $data[1],
        );
    }
}
