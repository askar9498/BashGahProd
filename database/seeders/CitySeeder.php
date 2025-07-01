<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFileName = "iranCities.csv";
        $csvFile = public_path('imports/' . $csvFileName);
        $data = $this->readCSV($csvFile, array('delimiter' => ','));
        $province_temp = '';
        $province_id = 0;

        foreach ($data as $item) {
            if ($item && $province_temp != $item[0]) {
                $province = new Province();
                $province->name = $item[0];
                $province->save();

                $province_temp = $item[0];
                $province_id = $province->id;
            }
            if ($item) {
                $city = new City();
                $city->name = $item[1];
                $city->province_id = $province_id;
                $city->save();
            }
        }
    }

    public function readCSV($csvFile, $array): array
    {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
        }
        fclose($file_handle);
        return $line_of_text;
    }
}
