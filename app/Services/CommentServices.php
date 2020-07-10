<?php
namespace App\Services;


use App\Models\Comment;
use App\Models\Post;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CommentServices {

    public function createComment($data, Post $post): Comment
    {
        $comment = new Comment();
        $comment->text = Arr::get($data, 'text');
        $comment->post_id = $post->id;
        $comment->user_id = Auth::user() ? Auth::user()->id : null;
        $comment->save();
        return $comment;
    }

    public function getComments()
    {
        $comments =  Comment::query()->get();
        return $comments;
    }


}
