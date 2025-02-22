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
            DB::table('khach_hang')->insert([
                'HoTen' => 'Nguyễn Văn A'.$i,
                'HinhAnh'    => null,
                'Email' =>'nguyenvanA'.$i.'@gmail.com',
                'SoDienThoai'=> '033808639'.$i,
                'MatKhau' => md5('123'),
                'NgaySinh' => date('2004/07/23'),
                'GioiTinh' => 'nam',
                'VaiTro' => 'khach',
                'TrangThai' => '0',
                'created_at' => date('Y/m/d H:i:s') 
            ]);
        }
    }
}
