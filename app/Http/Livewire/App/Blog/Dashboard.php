<?php

namespace App\Http\Livewire\App\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public function render()
    {
        //if user does not have the permissions
        if (! auth()->user()->can('manage blog')) {
            abort(403, 'Unauthorized.');
        }
        
        return view('livewire.app.blog.dashboard',[
            'posts'=>Blog::paginate(10)
        ]);
    }
}
