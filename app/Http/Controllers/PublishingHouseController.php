<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PublishingHouse;
use DB;
use Validator;
use Illuminate\Support\MessageBag;

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
        $publishing_houses = $request->input('publishing_house');
        foreach($publishing_houses as $publishing_house){
            $publishing_house_same = PublishingHouse::where('publishing_house', $publishing_house)->get();
            if($publishing_house = ''){
                return redirect()->back()->with('errors', new MessageBag(['Nieko neįvedėte.']));
            }else{
                if (count($publishing_house_same) !== 0){
                    return redirect()->back()->with('errors', new MessageBag(['Leidykla jau yra išsaugota.']));
                }
            }
        }

        foreach($publishing_houses as $publishing_house){
            $publishing_house = PublishingHouse::create([
                'publishing_house' => $publishing_house
            ]);
        }
        if ($publishing_house) {
            return redirect('publishing-house')->with('status', 'Leidykla išsaugota sėkmigai.');
        }
        return redirect()->back()->with('errors', new MessageBag(['Leidyklos išsaugoti nepavyko. Bandykite dar kartą.']));
        /*$validator =  Validator::make($request->all(), [
            'publishing_house' => 'required|max:255|unique:publishing_houses,publishing_house'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $publishing_house = PublishingHouse::create([
            'publishing_house' => $request->input('publishing_house')
        ]);
        if ($publishing_house) {

            return redirect('publishing-house')->with('status', 'Type created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new type. Please try again.']));*/
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
        $validator =  Validator::make($request->all(), [
            'publishing_house' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Leidyklos atnaujinti nepavyko.'])->with('wrong_genre_id', $id);
        }

        if ($publishing_house = PublishingHouse::find($id)) {
            $publishing_house->publishing_house = $request->input('publishing_house');
        $response = $publishing_house->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Leidykla atnaujinta sėkmingai.']);
            }
            return redirect('/publishing-house');
        }


        $this->validate($request, [
            'publishing_house' => 'required|max:255'
        ]);
        $publishing_house = PublishingHouse::find($id);
        $publishing_house->publishing_house = $request->input('publishing_house');
        $response = $publishing_house->save();
        if ($response) {
            return redirect()->back()
                    ->with(['message' => 'Leidykla atnaujinta sėkmingai.']);
        }
        return redirect()->back()
                ->withErrors(['error' => 'Leidyklos atnaujinti nepavyko. Bandykite dar kartą.']);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('publishing_houses')->where('id', $id)->delete();
        return redirect('/publishing-house');
    }

   /* public function order()
    {
        $types = DB::table('types')->orderBy('type')->get();
        return view('type.index', compact('types'));
    }*/
}
