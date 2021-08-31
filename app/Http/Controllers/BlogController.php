<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\blogCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BlogController extends Controller
{

    public function allPosts()
    {
        $posts=Blog::latest()->paginate(5);

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
       $post=Blog::find($id);

       return view('blog.post')->with('post',$post);
   }

}
