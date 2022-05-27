<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'author_name',
    ];

    // protected $table='posts';


    protected static function newFactory():PostFactory
{
    return new PostFactory();
}

// public function comments(): HasMany
// {
//     return $this->hasMany(Comment::class);
// }

// class Fastfood extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'title',
//         'body',
//         'author_name',
//     ];

//     // protected $table='posts';
// }

public function comments(): MorphMany
{
    return $this->morphMany(Comment::class, 'commentable');
}

}