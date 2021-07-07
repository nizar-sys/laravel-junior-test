<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'mobile company',
            'email' => 'tencent@gmail.com',
            'website' => 'www.tencent.com',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
    }
}
