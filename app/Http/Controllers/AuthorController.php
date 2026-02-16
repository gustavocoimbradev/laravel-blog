<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreAuthorRequest, DestroyAuthorRequest, UpdateAuthorRequest};
use App\Models\Author;
use App\Services\AuthorService;
use Inertia\Inertia;

class AuthorController extends Controller
{

    public function index() {
        $authors = Author::all();
        return Inertia::render('Authors/Index', $authors);
    }

    public function create() {
        return Inertia::render('Authors/Create');
    }

    public function edit(Author $author) {
        return Inertia::render('Authors/Edit', $author);
    }
    
    public function show(Author $author) {
        return Inertia::render('Authors/Show', $author);
    }

    public function store(StoreAuthorRequest $request, AuthorService $service) {
        $author = $service->create($request->validated());
        return to_route('show-author', $author);
    }

    public function update(UpdateAuthorRequest $request, AuthorService $service, Author $author) {
        $service->update($author, $request->validated());
        return to_route('show-author', $author);
    }

    public function destroy(DestroyAuthorRequest $request, AuthorService $service, Author $author) {
        $service->delete($author);
        return to_route('all-authors');
    }

}
