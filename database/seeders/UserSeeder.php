<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'nik' => '18950509',
                'password' => Hash::make('telkomakses'),
                'name' => 'YUDHA GUNTARA',
                'role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '91131191',
                'password' => Hash::make('telkomakses'),
                'name' => 'HASBULLAH',
                'role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '23980038',
                'password' => Hash::make('telkomakses'),
                'name' => 'ROFIKO DWI KURNIAWAN',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '23980037',
                'password' => Hash::make('telkomakses'),
                'name' => 'RIFKI DWI KURNIAWAN',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '23960030',
                'password' => Hash::make('telkomakses'),
                'name' => 'M. NOOR KHALISH',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '23020033',
                'password' => Hash::make('telkomakses'),
                'name' => 'M. IKHWAN NAZARI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16021847',
                'password' => Hash::make('telkomakses'),
                'name' => 'ANGGA MAULANA',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16981128',
                'password' => Hash::make('telkomakses'),
                'name' => 'YUSUF YOGA',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16050517',
                'password' => Hash::make('telkomakses'),
                'name' => 'MUHAMMAD HAIRULLLAH',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16940623',
                'password' => Hash::make('telkomakses'),
                'name' => 'DHONI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16880596',
                'password' => Hash::make('telkomakses'),
                'name' => 'DZIKRIL',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '23920007',
                'password' => Hash::make('telkomakses'),
                'name' => 'MUHAMMAD HAMIM',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16994757',
                'password' => Hash::make('telkomakses'),
                'name' => 'MUHAMMAD YUSRIL MAHENDRA',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '23010028',
                'password' => Hash::make('telkomakses'),
                'name' => 'MUHAMMAD ABI RIZAL',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '23040014',
                'password' => Hash::make('telkomakses'),
                'name' => 'MUHAMMAD RASYID RIDHA',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16021976',
                'password' => Hash::make('telkomakses'),
                'name' => 'AFRIANSYAH',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16013159',
                'password' => Hash::make('telkomakses'),
                'name' => 'MUHAMMAD RIDHO DHARMA SEPTYAN NOOR',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '15892399',
                'password' => Hash::make('telkomakses'),
                'name' => 'UNTUNG MULYONO',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16031108',
                'password' => Hash::make('telkomakses'),
                'name' => 'MUHAMMAD IRWAN DANI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16013102',
                'password' => Hash::make('telkomakses'),
                'name' => 'MUHAMMAD NAFIS',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '16030936',
                'password' => Hash::make('telkomakses'),
                'name' => 'INDRA HAFIZI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '22970204',
                'password' => Hash::make('telkomakses'),
                'name' => 'M. AMAR FAUZI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '20990165',
                'password' => Hash::make('telkomakses'),
                'name' => 'MUHAMAD ALZAHSI ANSARI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'nik' => '21990081',
                'password' => Hash::make('telkomakses'),
                'name' => 'KHAIRI MADANI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'nik' => '22000258',
                'password' => Hash::make('telkomakses'),
                'name' => 'AKHMAD ZAINI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '20920803',
                'password' => Hash::make('telkomakses'),
                'name' => 'AGUNG OKA DWI HERIBOWO',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '20981053',
                'password' => Hash::make('telkomakses'),
                'name' => 'M. HASBI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '20971598',
                'password' => Hash::make('telkomakses'),
                'name' => 'LUKMAN FAUZI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '20981110',
                'password' => Hash::make('telkomakses'),
                'name' => 'ABDUL KADIR ZAILANI',
                'role' => 'Teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
