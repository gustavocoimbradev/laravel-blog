<?php 

namespace App\Services;

use App\Models\Author;

class AuthorService {

    public function create(array $data): Author {
        return Author::create($data);
    }

    public function delete(Author $author): void {
        $author->delete();
    }

    public function update(Author $author, array $data): void {
        $author->update($data);
    }

}