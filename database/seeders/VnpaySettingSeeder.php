<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VnpaySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("vnpay_settings")->insert([
            'vnp_tmn_code' => 'YOUR_VNP_TMN_CODE',
            'vnp_hash_secret' => 'YOUR_VNP_HASH_SECRET',
            'vnp_url' => 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html'
        ]);
    }
}
