<?php

use Illuminate\Database\Seeder;

class GlobalSettingSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('global_setting')->insert([
            ['persen' => "10",
            'inforekening' => "BCA 123456789 an Yayasan Sedekah Mudah"],
        ]);
    }
}
