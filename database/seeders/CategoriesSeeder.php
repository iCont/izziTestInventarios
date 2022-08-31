<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesSeeder extends Seeder
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
                'name' => 'Electrónica',
                'created_at' => $time
            ],
            [
                'name' => 'Línea Blanca',
                'created_at' => $time
            ],
            [
                'name' => 'Deportes',
                'created_at' => $time
            ],
            [
                'name' => 'Alimentos',
                'created_at' => $time
            ],
            [
                'name' => 'Jardinería',
                'created_at' => $time
            ]
        ];
        DB::table('categories')->insert($data);
    }
}
