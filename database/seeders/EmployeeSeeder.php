<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert([
            'name' => 'Salsabila',
            'position' => 'Quality Assurance',
            'address' => 'Surabaya',
            'age' => '25',
            'sex' => 'Perempuan',
            'email' => 'salsabilananda@mail.com',
            'telp' => '082334'
        ]);
    }
}
