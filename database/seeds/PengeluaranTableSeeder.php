<?php

use Illuminate\Database\Seeder;

class PengeluaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('pengeluaran')->insert(array(
    		[
    			'created_at' => '2019-06-07 07:32:01',
    			'jenis_pengeluaran' => 'Raka Fajar Salinggih',
    			'nominal' => '5700000'
    		]
    	));
    }
}
