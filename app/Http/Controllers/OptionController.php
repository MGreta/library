<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Option;
use Validator;
use DB;
use Illuminate\Support\MessageBag;

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
            'debt_price' => 'required|max:255|numeric'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        $price_id = Option::where('name', 'debt_price')->value('id');

        $price = Option::find($price_id);
        $price->value = $request->input('debt_price');
        $response = $price->save();
        if ($response) {
            return redirect()->back()->with(['message' => 'Kainos nustatytmas išsaugotas.']);
        }
        return redirect('/options');
    }

    public function daysToHaveBook(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'days_to_have_book' => 'required|max:255|numeric'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $days_id = Option::where('name', 'days_to_have_book')->value('id');

        $days = Option::find($days_id);
        $days->value = $request->input('days_to_have_book');
        $response = $days->save();
        if ($response) {
            return redirect()->back()->with(['message' => 'Dienų nustatymas išsaugotas.']);
        }
        return redirect('/options');
    }
}
