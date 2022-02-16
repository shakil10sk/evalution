<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'Mango',
            'description' => 'Mango is very testy fruit in Banladesh.',
            'subcategory_id' => '1',
            'price' => '250',
        ]);
    }
}
