<?php

use Illuminate\Database\Seeder;
use App\Thread;

class ThreadsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$body = 'この文章はテストです。';
		for( $i = 1 ; $i <= 10 ; $i++)
		{
		$thread = new Thread;
		$thread->user_id = 1;
		$thread->profile_id =1;
		$thread->category_id = 1;
		$thread->thread_title = "$i 番目の投稿";
		$thread->body = $body;
		$thread->created_at = time();
		$thread->updated_at = time();
		$thread->save();
		}
	}
}
