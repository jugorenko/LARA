<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $name = 'AVOKADO !';
        return view('hello', [
            'name' => $name,
        ]);
    }
}
