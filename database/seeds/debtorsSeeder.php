<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class debtorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('debtors')->insert([
          ['name' => 'Kris', 'tlp' => '0876376377'],  
          ['name' => 'Kris na', 'tlp' => '0876376378'],  
          ['name' => 'Kris telp', 'tlp' => '0876376379'],  
          ['name' => 'Adi', 'tlp' => '0876376370'],  
          ['name' => 'Atma', 'tlp' => '0876376371'],  
        ]);
    }
}
