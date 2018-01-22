e<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Genres;
use Validator;
use DB;
use Session;
use App\Book;
use Illuminate\Support\MessageBag;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genres::all();
        return view('genre.index', compact('genres'));
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
        $genre_inputs = $request->input('genre_input');
        foreach($genre_inputs as $genre_input){
            $genre_input_same = Genres::where('genre', $genre_input)->get();
            if($genre_input = ''){
                return redirect()->back()->with('errors', new MessageBag(['Nieko neįvedėte.']));
            }else{
                if (count($genre_input_same) !== 0){
                    return redirect()->back()->with('errors', new MessageBag(['Žanras jau yra išsaugotas.']));
                }
            }
        }

        foreach($genre_inputs as $genre_input){
            $genre_input = Genres::create([
                'genre' => $genre_input
            ]);
        }
        if ($genre_input) {
            return redirect('genres')->with('status', 'Žanras sėkmingai pridėtas.');
        }
        return redirect()->back()->with('errors', new MessageBag(['Žanro nepavyko išsaugoti. Bandykite dar kartą.']));
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

    public function GenreEdit(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'genre' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Žanro nepavyko išsaugoti. Bandykite dar kartą.'])->with('wrong_genre_id', $id);
        }

        if ($genre = Genres::find($id)) {
            $genre->genre = $request->input('genre');
            $response = $genre->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Žanras sėkmingai atnaujintas.']);
            }
            return redirect('/books');
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
        
        DB::table('genres')->where('id', $id)->delete();
        $genres = DB::table('genres')->get();

        return view('genre.index', compact('genres'));
    }

    public function order()
    {
        $genres = DB::table('genres')->orderBy('genre')->get();
        return view('genre.index', compact('genres'));
    }
}
