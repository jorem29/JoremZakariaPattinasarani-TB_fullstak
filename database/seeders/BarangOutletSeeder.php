<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\barang;
use App\Models\outlet;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BarangOutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=10; $i++){
            DB::table('barangs')->insert([
                'nama_barang' => Str::random(10),
            ]);
            DB::table('outlets')->insert([
                'nama_outlet' => Str::random(10),
            ]);
        }
    }
}
