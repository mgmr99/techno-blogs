<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class PostList extends Component
{
    use WithPagination;
    
    #[Url()]
    public $sort = 'desc';
    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc')?'desc':'asc';
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()->orderBy('published_at',$this->sort)->when(Category::where('slug',$this->category)->exists(),function($query){
            $query->withCategory($this->category);
        })
        ->where('title','like',"%{$this->search}%")->paginate(5);
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.post-list',);
    }

}
