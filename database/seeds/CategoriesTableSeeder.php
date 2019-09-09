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
                'name'=>'お知らせ'
            ],
            
            [
                'name'=>'授業'
            ],
            
            [
                'name'=>'宿題'
            ],
            
            [
                'name'=>'部活'
            ],
            
            [
                'name'=>'しゃべり場'
            ],
            
            [
                'name'=>'ミニゲーム'
            ],
           
            
        ]);
    }
}
