<?php
namespace App\Services;


use App\Models\Post;
use App\User;
use App\Models\Comment;
use App\Models\PostLike;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\Post\StorePost;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class PostServices {

    public function createPost($data, User $user, $request): Post
    {
        $post = new Post();
        $post->title = Arr::get($data, 'title');
        $post->text = Arr::get($data, 'text');
        $post->user_id = $user->id;
        $path = $request->file('image')->store('uploads', 'public');
        $post->image = $path;
        $post->published_at;
        $post->save();
        return $post;

    }

    public function getPosts(?User $user = null)
    {
        $posts = Post::withCount('comments', 'likes')
            ->orderBy('comments_count', 'desc')
            ->orderBy('likes_count', 'desc')
            ->paginate(5);

        foreach ($posts as &$post) {
            $count = 0;
            $iLiked = false;

            foreach ($post['likes'] as $like) {
                $count++;
                if ($user && $iLiked === false && $like['user_id'] == $user->id) {
                    $iLiked = true;
                }
            }

            $post['likes'] = $count;
            $post['liked_by_me'] = $iLiked;
        }
        return $posts;
    }

    public function setLike(int $postId, User $user): bool
    {

        $like = DB::table('post_likes')
            ->where('user_id', $user->id)
            ->where('post_id', $postId)
            ->first();

        if (!is_null($like)) {
            DB::table('post_likes')
                ->where('user_id', $user->id)
                ->where('post_id', $postId)
                ->delete();

            return false;
        }

        DB::table('post_likes')
            ->insert([
                'user_id' => $user->id,
                'post_id' => $postId
            ]);

        return true;
    }
}
