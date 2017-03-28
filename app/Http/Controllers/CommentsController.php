<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;
use Auth;
use App\Comments;

class CommentsController extends Controller
{
    public function addComment(Request $request, $id) {

    	$user_id = Auth::user()->id;
    	$validator =  Validator::make($request->all(), [
            'comment' => 'required|max:255'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $comment = Comments::create([
            'comment' => $request->input('comment'),
            'book_id' => $id,
            'user_id' => $user_id
        ]);
        if ($comment) {

            return redirect()->back()->with('status', 'Genre created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new genre. Please try again.']));
    }
}
