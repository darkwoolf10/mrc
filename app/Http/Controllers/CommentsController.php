<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        Comment::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy($id)
    {
        dd(1);
//        Comment::find($comment->id)->delete();
//        return Redirect::route('player.index');
    }
}
