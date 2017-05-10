<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Language;
use Validator;
use DB;
use Illuminate\Support\MessageBag;

class LanguageController extends Controller
{

    public function allLanguages()
    {
        $languages = Language::all();
        return view('language.index', compact('languages'));
    }

    /*public function index()
    {
        $languages = Language::all();
        return view('language.index', compact('languages'));
    }*/

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $languages = $request->input('language');
        foreach($languages as $language){
            $language_same = Language::where('language', $language)->get();
            if($language = ''){
                return redirect()->back()->with('errors', new MessageBag(['Nieko neįvedėte']));
            }else{
                if (count($language_same) !== 0){
                    return redirect()->back()->with('errors', new MessageBag(['kalba jau yra įvesta']));
                }
            }
        }

        foreach($languages as $language){
            $language = Language::create([
                'language' => $language
            ]);
        }
        if ($language) {
            return redirect('language')->with('status', 'Language created successfully.');
        }
        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new language. Please try again.']));
    }

    public function show($id)
    {
        //
    }

    /*public function editLanguage($id)
    {
        $language = Language::find($id);

        return view('language.edit', compact('language'));
    }*/

    public function LanguageEdit($id, Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'language' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Klaida. Neleistinas veiksmas.'])->with('wrong_id', $id);
        }

        if ($language = Language::find($id)) {
            $language->language = $request->input('language');
        $response = $language->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Knyga atnaujintas.']);
            }
            return redirect('/languages');
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('languages')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function order()
    {
        $languages = DB::table('languages')->orderBy('language')->get();
        return view('language.index', compact('languages'));
    }
}
