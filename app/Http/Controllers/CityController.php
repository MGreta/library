<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City;
use DB;
use Validator;

class CityController extends Controller
{
    public function index()
    {
        $city = City::all();
        return view('city.index', compact('city'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'city' => 'required|max:255'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $city = City::create([
            'city' => $request->input('city')
        ]);
        if ($city) {

            return redirect('city')->with('status', 'City created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new city. Please try again.']));
    }

    public function show($id)
    {
        //
    }

    /*public function edit($id)
    {
        $city = City::find($id);

        return view('city.edit', compact('city'));
    }*/

    public function cityEdit($id, Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'city' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Klaida. Neleistinas veiksmas.'])->with('wrong_id', $id);
        }

        if ($city = City::find($id)) {
            $city->city = $request->input('city');
            $response = $city->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Knyga atnaujintas.']);
            }
            return redirect('/city');
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
         DB::table('cities')->where('id', $id)->delete();
        return redirect()->back();
    }

   /* public function order()
    {
        $types = DB::table('types')->orderBy('type')->get();
        return view('type.index', compact('types'));
    }*/
}
