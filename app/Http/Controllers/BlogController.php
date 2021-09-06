<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\blogCategories;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{

    public function allPosts()
    {
        $posts=Blog::latest()->withCount(['comments as comments_count' => function ($query) {
            $query->where('verified', true);
        }])->paginate(5);

        foreach ($posts as $post) {
            $post->content=strip_tags($post->content);
            $post->content=preg_replace("/&#?[a-z0-9]+;/i","",$post->content);
        }
        $post_categories=blogCategories::all();
        return view('blog.index')->with([
            'posts' => $posts,
            'categories' => $post_categories,
        ]);
    }

   public function viewPosts($id)
   {
       $post=Blog::with('comments')
       ->where('id',$id)
       ->first();

       $comments=$post->comments()->where('verified',true)->get();
       return view('blog.post')->with([
           'post' => $post,
           'comments' => $comments
        ]);
   }

   public function commentPost(Request $request)
   {
       if ($request->ajax()) {
           //validate the request
           $request->validate([
               'comment' => ['required','string'],
                'user_id' => ['required'],
                 'post_id' => ['required'],
                 'token' => ['required'],
           ]);
           //submits the request
           Comments::create([
               'context' => $request->comment,
               'user_id' => $request->user_id,
               'post_id' => $request->post_id
           ]);

           return true;

       }
   }

}
