<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{

    public function index() {
        return Inertia::render('Posts/Index');
    }

    public function store(StorePostRequest $request) {
        Post::create($request->validated());
        return to_route('all-posts');
    }

}
