<?php

namespace App\Http\Livewire\App\Blog;

use App\Models\Blog;
use App\Models\Comments;
use Livewire\Component;

class Dashboard extends Component
{

    public $posts,$comments,$newCommments,$trending_posts;

    public function mount()
    {
        //get all posts and comments
        $this->posts=Blog::withCount('comments')->orderBy('id','desc')->get();

         //get  comments
         $this->getComments();

        //get trending posts
        $this->getTrendingPosts();

    }

    public function verifyComment($id)
    {
       $comment=Comments::find($id);
       $comment->verified=true;
       $comment->save();

       //updates the dashboard
       $this->getComments();
       $this->getTrendingPosts();

       session()->flash('message', 'Comment successfully verified.');
    }

    private function getComments()
    {
        $this->comments=Comments::with(['post','user'])->get();

        $this->newCommments=$this->comments->where('verified',false);
    }

    private function getTrendingPosts()
    {
        $this->trending_posts=Blog::withCount(['comments as comments_count' => function ($query) {
            $query->where('verified', true);
        }])
        ->orderBy('comments_count', 'desc')
        ->take(5)
        ->get();
    }



    public function render()
    {
        //if user does not have the permissions
        if (! auth()->user()->can('manage blog')) {
            abort(403, 'Unauthorized.');
        }

        return view('livewire.app.blog.dashboard');
    }
}
