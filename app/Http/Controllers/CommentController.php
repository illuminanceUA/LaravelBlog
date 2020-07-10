<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\CommentServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Comment\StoreComment;


class CommentController extends Controller
{
    private $CommentServices;

    public function __construct(CommentServices $CommentServices)
    {
        return $this->CommentServices = $CommentServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index():View
    {
        return view('posts/{id}', ['comments' => $this->CommentServices->getComments()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
       // return View('posts/{id}/addComment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreComment $request)
    {
        $this->CommentServices->createComment(
            $request->validated(),
            $post = Post::find($request->get('post_id'))
        );

        return back();

        }



   public function show(Comment $comment)
    {
        //
    }



   public function edit(Comment $comment)
    {

    }



   public function update(Request $request, Comment $comment)
    {
        //
    }





    public function destroy($id)
    {
        //
    }
}
