<?php

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('should create a new post', function(){
    $author = Author::factory()->create();
    $data = ['title' => fake()->sentence(3), 'content' => fake()->paragraph(3, true), 'author_id' => $author->id];
    $response = $this->post(route('create-post'), $data);
    $response->assertStatus(302);
    $this->assertDatabaseHas('posts', $data);
    $response->assertRedirect(route('all-posts'));
});