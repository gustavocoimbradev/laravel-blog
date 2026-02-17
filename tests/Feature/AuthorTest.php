<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Author;

uses(RefreshDatabase::class);

test('should return the author creating form', function() {
    $this->get(route('create-author-form'))->assertStatus(200);
});

test('should create an author', function () {
    $data = [ 'name' => 'Walter White', 'bio' => 'Teacher' ];
    $response = $this->post(route('create-author'), $data);
    $response->assertStatus(302);
    $this->assertDatabaseHas('authors', $data);
    $author = Author::first();
    $response->assertRedirect(route('edit-author-form', $author));
    
});

test('should show all authors', function() {
    $authors = Author::factory(10)->create();
    $response = $this->get(route('all-authors'));
    $response->assertStatus(200);
    $response->assertSee($authors[0]->name);
});

test('should show the author editing form', function() {
    $author = Author::factory()->create();
    $this->get(route('edit-author-form', $author))->assertStatus(200);
});

test('should edit an author', function() {
    $author = Author::factory()->create();
    $response = $this->put(route('edit-author', ['author' => $author, 'name' => 'New Name', 'bio' => 'New Bio' ]));
    $response->assertStatus(302);
    $response->assertRedirect(route('edit-author-form', $author));
    $this->assertDatabaseHas('authors', [ 'id' => $author->id, 'name' => 'New Name', 'bio' => 'New Bio' ]);
});

test('should delete an author', function(){
    $author = Author::factory()->create();
    $response = $this->delete(route('delete-author', $author));
    $response->assertStatus(302);
    $response->assertRedirect(route('all-authors'));
    $this->assertDatabaseMissing('authors', ['id' => $author->id]);
});
