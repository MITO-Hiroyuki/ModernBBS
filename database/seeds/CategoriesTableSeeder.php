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
                'category'=>'総合'
            ],
            
            [
                'category'=>'芸能'
            ],
            
            [
                'category'=>'政治'
            ],
            
            [
                'category'=>'経済'
            ],
            
            [
                'category'=>'IT'
            ],
            
            [
                'category'=>'スポーツ'
            ],
            
            [
                'category'=>'映画'
            ],
            
            [
                'category'=>'音楽'
            ],
            
            [
                'category'=>'漫画'
            ]
            
        ]);
    }
}
