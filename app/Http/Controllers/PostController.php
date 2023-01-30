<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'min:10']
        ]);

        auth()->user()->posts()->create([
            'content' => $validated['content']
        ]);

        return redirect()->back()->with('success', 'Your post was created');
    }

    public function like(Post $post)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 4 User, step 5.
        | Implement this action as instructed
        |-----------------------------------------------------------------------
        */


        $post_id = $post->id;
        $user_id = Auth::user()->id;

        $user = User::findorFail($user_id);
        $post = Post::findorFail($post_id);

        if(DB::table('post_likes')->where('user_id', $user_id)->where('post_id', $post_id)->first() == null)   {
            $user->likes()->attach($post_id);
        }

        return redirect()->route("home");

    }

    public function dislike(Post $post)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 4 User, step 5.
        | Implement this action as instructed
        |-----------------------------------------------------------------------
        */
        //dd($post);
        $post_id = $post->id;
        $user_id = Auth::user()->id;

        $user = User::findorFail($user_id);
        $post = Post::findorFail($post_id);

        if(DB::table('post_likes')->where('user_id', $user_id)->where('post_id', $post_id)->first() ==! null) {
            $user->likes()->detach($post_id);
        }

        return redirect()->route("home");
    }

    public function delete(Post $post)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 6 User, step 6.
        | Implement this action as instructed
        |-----------------------------------------------------------------------
        */

        $post_id = $post->id;
        $user_id = Auth::user()->id;

        DB::table('posts')->where('user_id', $user_id)->where('id', $post_id)->delete();


        /*
        |-----------------------------------------------------------------------
        | Task 3 Moderator, step 6.
        | Implement this action as instructed
        |-----------------------------------------------------------------------
        */

        return redirect()->route("home")->with('success', 'The post was deleted');
    }

}
