<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User::create([
        //     'name' => 'Indra Wijaya',
        //     'email' => 'indra@gmail.com',
        //     'password' => Hash::make('password'),
        //     'jenis_kelamin' => 'L',
        //     'alamat' => 'Samboja'
        // ]);

        // Mahasiswa::create([
        //     'user_id' => 1,
        //     'nim' => '1915036042',
        //     'jurusan' => 'Sistem Informasi'
        // ]);
    }
}
