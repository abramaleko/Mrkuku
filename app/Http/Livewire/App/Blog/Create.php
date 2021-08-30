<?php

namespace App\Http\Livewire\App\Blog;

use App\Models\Blog;
use App\Models\blogCategories;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $categories;
    public $title,$content,$post_category,$post_status,$photo;

    protected $listeners=['blogContent'];

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
        'photo' => 'nullable|image|max:3072', //3MB Max

    ];

    public function blogContent($content)
    {
       $this->content=$content;
    }

    public function savePost()
    {
       $this->validate();

       if ($this->photo)
         $path = $this->photo->store('blog-posts','public');
       else
       $path=null;

       Blog::create([
           'title' => $this->title,
           'content' => $this->content,
           'category_id' => $this->post_category,
           'status' => $this->post_status,
           'image_path' => $path,
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
