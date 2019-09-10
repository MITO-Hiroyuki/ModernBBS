<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$comment_text = 'このコメントはテストです。';
		for( $i = 1 ; $i <= 10 ; $i++)
		{
		$comment = new comment;
		$comment->user_id = 1;
		$comment->profile_id =1;
		$comment->thread_id = 1;
		$comment->comment_text = $comment_text;
		$comment->created_at = time();
		$comment->updated_at = time();
		$comment->save();
		}
	}
}
