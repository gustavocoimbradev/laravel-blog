<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function store(StorePostRequest $request) {
        Post::create($request->validated());
        return to_route('all-posts');
    }

}
