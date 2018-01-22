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
