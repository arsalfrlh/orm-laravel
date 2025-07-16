<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Beli;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sasa',
            'email' => 'sasa@gmail.com',
            'password' => Hash::make(123),
        ]);

        Barang::create([
            'nama_barang' => 'Voucher',
        ]);

        Beli::create([
            'id_user' => 4,
            'id_barang' => 3,
        ]);
    }
}
