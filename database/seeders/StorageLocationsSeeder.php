<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageLocationsSeeder extends Seeder
{
    public function run()
    {
        DB::table('storage_locations')->insert([
            ['path' => 'D:/test1'],
            ['path' => 'D:/test2'],
            ['path' => 'D:/test3'],
            // Tambahkan lebih banyak lokasi jika diperlukan
        ]);
    }
}

