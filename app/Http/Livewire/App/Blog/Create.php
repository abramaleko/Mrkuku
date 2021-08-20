<?php

namespace App\Http\Livewire\App\Blog;

use App\Models\Blog;
use App\Models\blogCategories;
use Livewire\Component;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public $categories;
    public $title,$content,$post_category,$post_status;

    public function mount()
    {
      $this->categories=blogCategories::all();
      $this->post_category="";
      $this->post_status="published";
    }

    protected $rules = [
        'title' => 'required|string|min:6',
        'content' => 'required|string',
        'post_category' => 'required',
    ];

    public function savePost()
    {
       $this->validate();

       Blog::create([
           'title' => $this->title,
           'content' => $this->content,
           'category_id' => $this->post_category,
            'status' => $this->post_status
        ]);

        return redirect()->route('blog.dashboard');

    }



    public function render()
    {
        //if user does not have the permissions
        if (! auth()->user()->can('manage blog')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.blog.create');
    }
}
