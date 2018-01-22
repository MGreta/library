<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City;
use DB;
use Validator;
use Illuminate\Support\MessageBag;

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
        $cities = $request->input('city');
        foreach($cities as $city){
            $city_same = City::where('city', $city)->get();
            if($city = ''){
                return redirect()->back()->with('errors', new MessageBag(['Nieko neįvedėte.']));
            }else{
                if (count($city_same) !== 0){
                    return redirect()->back()->with('errors', new MessageBag(['Toks miestas jau yra išsaugotas.']));
                }
            }
        }

        foreach($cities as $city){
            $city = City::create([
                'city' => $city
            ]);
        }
        if ($city) {
            return redirect('city')->with('status', 'Miestas sėkmingai išsaugotas.');
        }
        return redirect()->back()->with('errors', new MessageBag(['Miesto nepavyko išsaugoti. Bandykite dar kartą.']));
    }

    public function show($id)
    {
        //
    }

    public function cityEdit($id, Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'city' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Miesto nepavyko pakeisti. Bandykite dar kartą.'])->with('wrong_id', $id);
        }

        if ($city = City::find($id)) {
            $city->city = $request->input('city');
            $response = $city->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Miestas atnaujintas.']);
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
    
}
