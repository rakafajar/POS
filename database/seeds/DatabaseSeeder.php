<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KategoriTableSeeder::class);
        $this->call(ProdukTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(MemberTableSeeder::class);
        $this->call(PengeluaranTableSeeder::class);

    }
}
