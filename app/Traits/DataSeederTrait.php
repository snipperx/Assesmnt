<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait DataSeederTrait
{

    public function persistData($csvFile , $array, $table){
        $fline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$fline) {
                $myArray = $array($data);
                DB::table($table)->insert($myArray);
            }
            $fline = false;
        }
        fclose($csvFile);
    }
}
