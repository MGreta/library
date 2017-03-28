<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Genres;
use Validator;
use DB;

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
        $validator =  Validator::make($request->all(), [
            'genre' => 'required|max:255'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $genre = Genres::create([
            'genre' => $request->input('genre')
        ]);
        if ($genre) {

            return redirect('admin/genres')->with('status', 'Genre created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new genre. Please try again.']));
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

    public function editGenre($id)
    {
        $genre = Genres::find($id);

        return view('genre.edit', compact('genre'));
    }

    public function GenreEdit($id, Request $request)
    {
        $this->validate($request, [
            'genre' => 'required|max:255'
        ]);
        $genre = Genres::find($id);
        $genre->genre = $request->input('genre');
        $response = $genre->save();
        if ($response) {
            return redirect()->back()
                    ->with(['message' => 'Knyga atnaujintas.']);
        }
        return redirect()->back()
                ->withErrors(['error' => 'Klaida. Neleistinas veiksmas.']);
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
        //
    }

    public function order()
    {
        $genres = DB::table('genres')->orderBy('genre')->get();
        return view('genre.index', compact('genres'));
    }
}
