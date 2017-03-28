<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Option;

class OptionController extends Controller
{
    public function index()
    {
    	$options = Option::all();

    	return view('options.index', compact('options'));
    }
}
