<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayOsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("pay_os")->insert([
            'Client_ID' => '03324eda-ba77-4f81-a8ac-7699aa85754b',
            'API_Key' => '69c449b4-374b-46dd-94d9-96602562c904',
            'Checksum_Key' => '327cc34afe0a717aca4ad5bbc4f9f593018c613cbcc312b694fe3661b13d34d7'
        ]);
    }
}
