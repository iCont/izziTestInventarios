<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = date('Y-m-d H:i:s');
        $data = [
            [
                'name' => 'Cuernavaca',
                'created_at' => $time
            ],
            [
                'name' => 'Yautepec',
                'created_at' => $time
            ],
            [
                'name' => 'Cuautla',
                'created_at' => $time
            ],
            [
                'name' => 'Acapulco',
                'created_at' => $time
            ]
        ];
        DB::table('branches')->insert($data);
    }
}
