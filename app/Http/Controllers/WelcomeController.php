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

		/*$y2006Details = CompanyDetails::where ( 'year', '2006' )->get ();
		$y2007Details = CompanyDetails::where ( 'year', '2007' )->get ();
		$y2008Details = CompanyDetails::where ( 'year', '2008' )->get ();
		$y2009Details = CompanyDetails::where ( 'year', '2009' )->get ();
		$y2010Details = CompanyDetails::where ( 'year', '2010' )->get ();
		$y2011Details = CompanyDetails::where ( 'year', '2011' )->get ();
		$y2012Details = CompanyDetails::where ( 'year', '2012' )->get ();
		$y2013Details = CompanyDetails::where ( 'year', '2013' )->get ();
		$y2014Details = CompanyDetails::where ( 'year', '2014' )->get ();
		$y2015Details = CompanyDetails::where ( 'year', '2015' )->get ();
		
		$companyNames = CompanyDetails::select ( 'company' )->groupBy ( 'company' )->get ();
		$chartArray ["chart"] = array (
				"type" => "line" 
		);
		$chartArray ["title"] = array (
				"text" => "Yearly sales" 
		);
		$chartArray ["credits"] = array (
				"enabled" => false 
		);
		$chartArray ["xAxis"] = array (
				"categories" => array () 
		);
		$chartArray ["tooltip"] = array (
				"valueSuffix" => "$" 
		);
		
		$categoryArray = array (
				'2006',
				'2007',
				'2008',
				'2009',
				'2010',
				'2011',
				'2012',
				'2013',
				'2014',
				'2015' 
		);
		$y2006 = [ ];
		$y2007 = [ ];
		$y2008 = [ ];
		$y2009 = [ ];
		$y2010 = [ ];
		$y2011 = [ ];
		$y2012 = [ ];
		$y2013 = [ ];
		$y2014 = [ ];
		$y2015 = [ ];
		$dataArray = [ ];
		$comapanyNamesArray = [ ];
		
		foreach ( $companyNames as $company )
			array_push ( $comapanyNamesArray, $company->company );
		
		foreach ( $y2006Details as $det )
			array_push ( $y2006, ( int ) $det->sales );
		foreach ( $y2007Details as $det )
			array_push ( $y2007, ( int ) $det->sales );
		foreach ( $y2008Details as $det )
			array_push ( $y2008, ( int ) $det->sales );
		foreach ( $y2009Details as $det )
			array_push ( $y2009, ( int ) $det->sales );
		foreach ( $y2010Details as $det )
			array_push ( $y2010, ( int ) $det->sales );
		foreach ( $y2011Details as $det )
			array_push ( $y2011, ( int ) $det->sales );
		foreach ( $y2012Details as $det )
			array_push ( $y2012, ( int ) $det->sales );
		foreach ( $y2013Details as $det )
			array_push ( $y2013, ( int ) $det->sales );
		foreach ( $y2014Details as $det )
			array_push ( $y2014, ( int ) $det->sales );
		foreach ( $y2015Details as $det )
			array_push ( $y2015, ( int ) $det->sales );
		
		array_push ( $dataArray, $y2006, $y2007, $y2008,
				$y2009, $y2010, $y2011, $y2012, $y2013, 
				$y2014, $y2015 );
		
		for($i = 0; $i < count ( $dataArray ); $i ++)
			$chartArray ["series"] [] = array (
					"name" => $comapanyNamesArray [$i],
					"data" => $dataArray [$i] 
			);
		
		$chartArray ["xAxis"] = array (
				"categories" => $categoryArray 
		);
		$chartArray ["yAxis"] = array (
				"title" => array (
						"text" => "Sales ( $ )" 
				) 
		);
		return view ('welcome')->withChartarray ( $chartArray );*/

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
