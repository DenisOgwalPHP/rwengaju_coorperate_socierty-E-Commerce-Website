<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class BlogDetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        $blog = Blog::where('slug', $this->slug)->first();
        return view('livewire.blog-details-component', ['blog' => $blog]);
    }
}