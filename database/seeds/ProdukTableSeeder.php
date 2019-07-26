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
	}
}
