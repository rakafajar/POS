<?php

use Illuminate\Database\Seeder;

class ProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = App\ProdukModel::all();
        foreach ($produk as $data) {
            $update = App\ProdukModel::find($data->id_produk);
            $update->kode_produk = rand(10000000, 99999999);
            $update->update();
        }
        
         DB::table('produk')->insert(array(
        	[

        		'id_produk' => '1',
        		'kode_produk' => '1',
        		'id_kategori' => '1',
        		'nama_produk' => 'Asus X442UR',
        		'merk' => 'ASUS',
        		'harga_beli' => '5000000',
        		'diskon' => '30',
        		'harga_jual' => '7000000',
        		'stok' => '5'
        	],
        	[
        		'id_produk' => '2',
        		'kode_produk' => '2',
        		'id_kategori' => '1',
        		'nama_produk' => 'Acer A3 E546G',
        		'merk' => 'Acer',
        		'harga_beli' => '5500000',
        		'diskon' => '40',
        		'harga_jual' => '6000000',
        		'stok' => '5'
        	],
        	[
        		'id_produk' => '3',
        		'kode_produk' => '1',
        		'id_kategori' => '2',
        		'nama_produk' => 'Piring',
        		'merk' => 'Gado-Gado',
        		'harga_beli' => '450000',
        		'diskon' => '80',
        		'harga_jual' => '700000',
        		'stok' => '3'
        	],
        ));
    }
}
