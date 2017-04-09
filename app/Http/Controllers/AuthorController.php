<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Author;
use Validator;
use DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allAuthors()
    {
        $authors = Author::all();
        return view('admin.authors', compact('authors'));
    }

    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
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
            'author_name' => 'required|max:255',
            'author_surname' => 'required|max:255'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $author = Author::create([
            'author_name' => $request->input('author_name'),
            'author_surname' => $request->input('author_surname')
        ]);
        if ($author) {

            return redirect('admin/authors')->with('status', 'Author created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new author. Please try again.']));
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

    /*public function editAuthor($id)
    {
        $author = Author::find($id);

        return view('admin.edit_author', compact('author'));
    }*/

    public function AuthorEdit($id, Request $request)
    {   
        $validator =  Validator::make($request->all(), [
            'author_name' => 'required|max:255|min:2',
            'author_surname' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Klaida. Neleistinas veiksmas.'])->with('wrong_id', $id);
        }

        if ($author = Author::find($id)) {
            $author->author_name = $request->input('author_name');
            $author->author_surname = $request->input('author_surname');
            $response = $author->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Knyga atnaujintas.']);
            }
            return redirect('/authors');
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
        //
    }

    public function orderByName()
    {
        $authors = DB::table('authors')->orderBy('author_name')->get();
        return view('admin.authors', compact('authors'));
    }

    public function orderBySurname()
    {
        $authors = DB::table('authors')->orderBy('author_surname')->get();
        return view('admin.authors', compact('authors'));
    }
}
