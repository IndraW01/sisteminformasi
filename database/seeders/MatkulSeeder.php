<?php

namespace Database\Seeders;

use App\Models\Matkul;
use Illuminate\Database\Seeder;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Matkul::create([
            'kode_matkul' => '12346',
            'nama_matkul' => 'Analisis Database',
            'sks' => 2
        ]);
    }
}
