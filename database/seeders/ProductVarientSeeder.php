<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVarientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $csvFile = fopen(base_path("productvarient.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                $products = array(
                    "product_id" => $data[0],
                    "sap_product_code" => $data[1],
                    "web_product_code" => $data[2],
                    "name" => $data[3]
                );
                DB::table('product_variant')->insert($products);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
