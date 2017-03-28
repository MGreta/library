<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PublishingHouse;
use DB;
use Validator;

class PublishingHouseController extends Controller
{

    public function index()
    {
        $publishing_house = PublishingHouse::all();
        return view('publishing_house.index', compact('publishing_house'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'publishing_house' => 'required|max:255'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $publishing_house = PublishingHouse::create([
            'publishing_house' => $request->input('publishing_house')
        ]);
        if ($publishing_house) {

            return redirect('type')->with('status', 'Type created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new type. Please try again.']));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $publishing_house = PublishingHouse::find($id);

        return view('publishing_house.edit', compact('publishing_house'));
    }

    public function PublishingHouseEdit($id, Request $request)
    {
        $this->validate($request, [
            'publishing_house' => 'required|max:255'
        ]);
        $publishing_house = PublishingHouse::find($id);
        $publishing_house->publishing_house = $request->input('publishing_house');
        $response = $publishing_house->save();
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
