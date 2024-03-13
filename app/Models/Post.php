<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'user_id',
        'title',
        'slug',
        'image',
        'body',
        'published_at',
        'featured',
    ];


    protected $casts = [
        'published_at' => 'datetime',
    ];
    
    public function scopePublished($query)
    {
        return $query->where('published_at','<=',now());
    }
    public function scopeWithCategory($query,$category)
    {
        $query->whereHas('categories',function ($query) use ($category){
            $query->where('slug',$category);
        });
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured',true);
    }
  
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    public function excerpt_words()
    {
        return Str::limit(strip_tags($this->body),250);
    }

    public function readTime()
    {
        return round(str_word_count($this->body)/25);
    }

    public function getImageThumbnail()
    {
       $isUrl =  str_contains($this->image,'http');

       return ($isUrl) ? $this->image : Storage::url($this->image);
    }
}
