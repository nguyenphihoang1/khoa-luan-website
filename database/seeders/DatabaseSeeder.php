<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(ChuyenMucSeeder::class);
        $this->call(SanPhamSeeder::class);
        $this->call(NhaCungCapSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(TinTucSeeder::class);
    }
}
