<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category'=>'お知らせ'
            ],
            
            [
                'category'=>'宿題'
            ],
            
            [
                'category'=>'部活'
            ],
            
            [
                'category'=>'友達'
            ],
            
            [
                'category'=>'生徒'
            ],
            
            [
                'category'=>'ミニゲーム'
            ],
           
            
        ]);
    }
}
