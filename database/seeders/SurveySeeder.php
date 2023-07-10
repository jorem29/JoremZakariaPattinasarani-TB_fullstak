<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\SurveyStock;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_stocks')->insert([
            'user_id' => 1,
            'barang_id' => 1,
            'outlet_id' => 1,
            'jumlah_stok' => 10,
            'jumlah_display' => 5,
        ]);
    }
}
