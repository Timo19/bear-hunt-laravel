<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
use App\Models\Bear;

class BearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bears')->truncate();

        $bears = Reader::createFromPath(storage_path() . '/beren_locaties.csv')->getRecords();

        foreach ($bears as $bear) {

            Bear::create([
                'name' => $bear[0],
                'city' => $bear[1],
                'region' => $bear[2],
                'latitude' => $bear[3],
                'longitude' => $bear[4],
            ]);
        }
    }
}
