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

    public function edit($id)
    {
        $city = City::find($id);

        return view('city.edit', compact('city'));
    }

    public function PublishingHouseEdit($id, Request $request)
    {
        $this->validate($request, [
            'publishing_house' => 'required|max:255'
        ]);
        $publishing_house = PublishingHouse::find($id);
        $publishing_house->publishing_house = $request->input('publishing_house');
        $response = $city->save();
        if ($response) {
            return redirect()->back()
                    ->with(['message' => '']);
        }
        return redirect()->back()
                ->withErrors(['error' => 'Klaida.']);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

   /* public function order()
    {
        $types = DB::table('types')->orderBy('type')->get();
        return view('type.index', compact('types'));
    }*/
}
