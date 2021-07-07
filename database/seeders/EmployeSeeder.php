<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employes')->insert([
            'firstname' => 'ahmad',
            'lastname' => 'nizar',
            'company_id' => '14',
            'email' => 'ahmad@gmail.com',
            'phone' => 8808080,
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
    }
}
