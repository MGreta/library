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
                return redirect()->back()->with('errors', new MessageBag(['Nieko neįvedėte']));
            }else{
                if (count($type_same) !== 0){
                    return redirect()->back()->with('errors', new MessageBag(['type jau yra įvesta']));
                }
            }
        }

        foreach($types as $type){
            $type = Type::create([
                'type' => $type
            ]);
        }
        if ($type) {
            return redirect('type')->with('status', 'Type created successfully.');
        }
        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new type. Please try again.']));
        /*$validator =  Validator::make($request->all(), [
            'type' => 'required|max:255|unique:types,type'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $type = Type::create([
            'type' => $request->input('type')
        ]);
        if ($type) {

            return redirect('type')->with('status', 'Type created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new type. Please try again.']));*/
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

    /*public function editType($id)
    {
        $type = Type::find($id);

        return view('admin.edit_type', compact('type'));
    }*/

    public function TypeEdit($id, Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'type' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Klaida. Neleistinas veiksmas.'])->with('wrong_id', $id);
        }

        if ($type = Type::find($id)) {
            $type->type = $request->input('type');
            $response = $type->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Knyga atnaujintas.']);
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
            /*foreach ($books_with_type as $book) {
                $book_id = Book::where('id', $book->id)->where('type', $id)->value('id');
                $book = Book::find($book_id);
                $book->type = '0';
                $book->save();
            }*/
            return redirect()->back()->withErrors(['error' => 'Klaida. Negalima ištrinti jeigu tipas turi knygų.']);
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
