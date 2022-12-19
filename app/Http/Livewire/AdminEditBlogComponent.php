<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditBlogComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $description;
    public $image;
    public $newImage;
    public $blog_id;

    public function mount($blog_slug){
        $blog = Blog::where('slug', $blog_slug)->first();
         $this->name =$blog->name;
         $this->slug =$blog->slug;
         $this->description =$blog->description;
         $this->image =$blog->image;
         $this->blog_id =$blog->id;
    }

    public function generateslug(){
        $this->slug = Str::slug($this->name, '-');
    }




    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
    }

    public function updateBlog(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $blog = Blog::find($this->blog_id);
        $blog->name = $this->name;
        $blog->slug = $this->slug;
        $blog->description = $this->description;
        if($this->newImage){
            $imageName = Carbon::now()->timestamp. '.' . $this->newImage->extension();
            $this->newImage->storeAs('blogs', $imageName);
            $blog->image = $imageName;
        }

        $blog->save();
        return redirect()->route('admin.blogs');
        session()->flash('message', 'Blog has been created Successfully');
    }
    public function render()
    {
        return view('livewire.admin-edit-blog-component')->layout('layouts.base');
    }
}