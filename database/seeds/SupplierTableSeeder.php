<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert(array(
            [
                'nama' => 'Raka Fajar',
                'alamat' => 'Komplek Pasir Jati B.131',
                'telpon' => '0882222238'
            ]
        ));

        
    }
}
