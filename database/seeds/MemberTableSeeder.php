<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member')->insert(array(
            [
                'kode_member' => '3123',
                'nama' => 'Raka Fajar Salinggih',
                'alamat' => 'Komplek Pasir Jati B.131',
                'telpon' => '088222238'
            ]
        ));
    }
}
