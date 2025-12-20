<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\HasBuilder;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasUlids, HasFactory;

    protected $table = 'tag';
    protected $fillable = ['title'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
