<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\MessageBag;

class WelcomeController extends Controller
{
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*$first_levels = DB::table('udk_first_level')->get();
		$first_level_results = [];
		if ($first_levels) {
			foreach ($first_levels as $first_level) {
				$first_level_results[] = [
					'id' => $first_level->id,
					'title' => $first_level->title,
					'code' => $first_level->code,
				];
			}
		}

		$second_levels = DB::table('udk_second_level')->get();
		$second_level_results = [];
		if ($second_levels) {
			foreach ($second_levels as $second_level) {
				$second_level_results[] = [
					'id' => $second_level->id,
					'first_level_id' => $second_level->id_first_level,
					'title' => $second_level->title,
					'code' => $second_level->code,
				];
			}
		}

		$third_levels = DB::table('udk_third_level')->get();
		$third_level_results = [];
		if ($third_levels) {
			foreach ($third_levels as $third_level) {
				$third_level_results[] = [
					'first_level_id' => $third_level->id_first_level,
					'second_level_id' => $third_level->id_second_level,
					'title' => $third_level->title,
					'code' => $third_level->code,
				];
			}
		}
		$genres = DB::table('genres')->get();

		$input = [];
		$string = "";
		return view('welcome', compact('first_level_results', 'second_level_results', 'third_level_results', 'input', 'string', 'genres'));*/
		return view('welcome');
	}

	public function addUrl(Request $request) {
		$first_levels = DB::table('udk_first_level')->get();
		$input = [];
		foreach ($first_levels as $first_level) {
			if ($request->input($first_level->id) !== 'not-selected') {
				$input[] = [
					'udk' => $request->input($first_level->id),
					'first_level_id' => $first_level->id,
				];
			}
		}
		
		print_r($input);
		/*$input = $request->all();*/
		$first_level_results = [];
		$second_level_results = [];
		$third_level_results = [];
		$genres = DB::table('genres')->get();
		$genre_id = $request->input('genre');
		$genre_code = DB::table('genres')->where('id', $genre_id)->value('code');

		$string = "";
		foreach($input as $each)
		{
			$string = $string . $each['udk'];
		}
		$string = $string . $genre_code;
		echo $string;

		return view('welcome', compact('first_level_results', 'second_level_results', 'third_level_results', 'input', 'string', 'genres'));
	}

}
