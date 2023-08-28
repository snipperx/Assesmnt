<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Product::truncate();
        $csvFile = fopen(base_path("products.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                $products = array(
                    "id" => $data[0],
                    "name" => $data[1],
                    "slug" => $data[2]
                );
                DB::table('products')->insert($products);
            }

            $firstline = false;

        }
        fclose($csvFile);
    }
}
