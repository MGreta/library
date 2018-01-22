<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Author;
use Validator;
use DB;
use Illuminate\Support\MessageBag;
use Image;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function allAuthors()
    {
        $authors = Author::all();
        return view('admin.authors', compact('authors'));
    }*/

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
            'country' => 'max:255',
            'birth_date' => 'max:255',
            'death_date' => 'max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        Image::make($image)->resize(300, 300)->save( public_path('authorsImages/' . $filename) );
        $author_name = $request->input('author_name');
        $country = $request->input('country');

        if ($request->has('create')) {
            $author = new Author();
            $author->author_name = $request->input('author_name');
            $author->country = $request->input('country');
            $author->birth_date = $request->input('birth_date');
            $author->death_date = $request->input('death_date');
            $author->image = $filename;
            $author->save();

            return redirect('authors')->with('status', 'Autorius sėkmingai pridėtas.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Kažkas negerai. Bandykite dar kartą.']));
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

    public function AuthorEdit($id, Request $request)
    {   
        $validator =  Validator::make($request->all(), [
            'author_name' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Kažkas negerai. Bandykite dar kartą.'])->with('wrong_id', $id);
        }

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        Image::make($image)->resize(300, 300)->save( public_path('authorsImages/' . $filename) );

        if ($author = Author::find($id)) {
            $author->author_name = $request->input('author_name');
            $author->country = $request->input('country');
            $author->birth_date = $request->input('birth_date');
            $author->death_date = $request->input('death_date');
            $author->image = $filename;
            $response = $author->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Knyga atnaujintas.']);
            }
            return redirect('authors');
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
        DB::table('authors')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function orderByName()
    {
        $authors = DB::table('authors')->orderBy('author_name')->get();
        return view('admin.authors', compact('authors'));
    }

}
