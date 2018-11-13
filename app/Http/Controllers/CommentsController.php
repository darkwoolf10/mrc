<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentsController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|string',
        ]);
        Comment::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            throw new NotFoundHttpException('Comment not found');
        }
        $comment->delete();
        return response()->json([
            'status' => 'Ok',
        ]);
    }
}
