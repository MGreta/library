<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Type;
use DB;
use Validator;
use Illuminate\Support\MessageBag;
use App\Book;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $types = $request->input('type');
        foreach($types as $type){
            $type_same = Type::where('type', $type)->get();
            if($type = ''){
                return redirect()->back()->with('errors', new MessageBag(['Nieko neįvedėte.']));
            }else{
                if (count($type_same) !== 0){
                    return redirect()->back()->with('errors', new MessageBag(['Tipas jau yra išsaugotas.']));
                }
            }
        }

        foreach($types as $type){
            $type = Type::create([
                'type' => $type
            ]);
        }
        if ($type) {
            return redirect('type')->with('status', 'Tipas sėkmingai išsaugotas.');
        }
        return redirect()->back()->with('errors', new MessageBag(['Tipo išsaugoti nepavyko. Bandykite dar kartą.']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function TypeEdit($id, Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'type' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Tipo atnaujinti nepavyko. Bandykite dar kartą'])->with('wrong_id', $id);
        }

        if ($type = Type::find($id)) {
            $type->type = $request->input('type');
            $response = $type->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Tipas sėkmingai atnaujintas.']);
            }
            return redirect('/type');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books_with_type = Book::where('type', $id)->get();
        if (count($books_with_type) > 0){
            return redirect()->back()->withErrors(['error' => 'Negalima ištrinti jeigu tipas turi knygų.']);
        }
        DB::table('types')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function order()
    {
        $types = DB::table('types')->orderBy('type')->get();
        return view('type.index', compact('types'));
    }
}
