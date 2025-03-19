<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i<=5 ; $i++){
            DB::table('users')->insert([
                'name' => 'Nguyễn Văn A'.$i,
                'image'    => null,
                'email' =>'nguyenvanA'.$i.'@gmail.com',
                'phone'=> '033808639'.$i,
                'password' => md5('123'),
                'birthday' => date('2004/07/23'),
                'sex' => 'nam',
                'address' => 'Hải Phòng',
                'role' => 'User',
                'created_at' => date('Y/m/d H:i:s') 
            ]);
        }
    }
}
