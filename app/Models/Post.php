<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasUlids , HasFactory;
    protected $table = 'post';
    // protected $primaryKey = 'id';
    // protected $keyType = 'string';
    // public $incrementing = false;
    protected $fillable = [
        'title',
        'body',
        'author',
        'published',
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
