<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fastfood extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'author_name',
    ];

    // protected $table='posts';
}
