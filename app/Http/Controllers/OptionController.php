<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Option;
use Validator;
use DB;

class OptionController extends Controller
{
    public function index()
    {
    	$options = Option::all();

    	return view('options.index', compact('options'));
    }

    public function debtPrice(Request $request)
    {
    	$validator =  Validator::make($request->all(), [
            'price' => 'required|max:255|numeric'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $price = Option::create([
            'name' => 'debt_price',
            'value' => $request->input('price')
        ]);
        if ($price) {

            return redirect('/options')->with('status', 'Genre created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new genre. Please try again.']));
    }
}
