<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('kategori')->insert(array(
        	[
                'id_kategori' => '1',
        		'nama_kategori' => 'Laptop',
        	],
        	[
                'id_kategori' => '2',
        		'nama_kategori' => 'Alat Rumah Tangga',
        	],
        	[
                'id_kategori' => '3',
        		'nama_kategori' => 'Handphone'
        	]

        ));
    }
}
