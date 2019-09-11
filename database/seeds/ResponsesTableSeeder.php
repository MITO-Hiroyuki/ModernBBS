<?php

use Illuminate\Database\Seeder;
use App\Response;

class ResponsesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$response_text = 'このレスポンスはテストです。';
		for( $i = 1 ; $i <= 10 ; $i++)
		{
		$response = new Response;
		$response->user_id = 1;
		$response->profile_id = 1;
		$response->comment_id = 1;
		$response->response_text = $response_text;
		$response->created_at = time();
		$response->updated_at = time();
		$response->save();
		}
	}
}
