<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;
use Auth;
use App\Comments;
use App\Book;
use App\BookRatings;

class BookRatingsController extends Controller
{
    public function rate(Request $request, $id)
    {
    	$user_id = Auth::user()->id;
        if ($rating = BookRatings::where('book_id', $id)->where('user_id', $user_id)->value('id'))
        {
            $validator =  Validator::make($request->all(), [
                'book_rating' => 'required|max:255'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(['error' => 'Klaida. Neleistinas veiksmas.']);
            }

            if ($rating = BookRatings::find($rating)) {
                $rating->book_rating = $request->input('book_rating');
                $response = $rating->save();
                if ($response) {
                    return redirect()->back()->with(['message' => 'Knyga atnaujintas.']);
                }
                return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new genre. Please try again.']));
            }
        }
        else {
            $validator =  Validator::make($request->all(), [
                'book_rating' => 'required|max:255'
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $rating = BookRatings::create([
                'book_rating' => $request->input('book_rating'),
                'book_id' => $id,
                'user_id' => $user_id
            ]);
            if ($rating) {

                return redirect()->back()->with('status', 'Genre created successfully.');
            }

            return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new genre. Please try again.']));
        }
    	
    }
}
