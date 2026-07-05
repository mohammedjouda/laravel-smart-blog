<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

test('guest can search articles by keyword', function () {
    $author = User::factory()->create();
    $category = Category::create([
        'name' => 'General',
        'slug' => 'general',
    ]);
    
    Post::create([
        'user_id' => $author->id,
        'category_id' => $category->id,
        'title' => 'Serif typography resurgence in 2026',
        'content' => 'Lorem content with typography resurgence detail',
        'slug' => 'serif-typography-resurgence-in-2026',
        'status' => 'published',
    ]);
    
    Post::create([
        'user_id' => $author->id,
        'category_id' => $category->id,
        'title' => 'Focused workspaces in minimal environment',
        'content' => 'Lorem content with workspaces focus detail',
        'slug' => 'focused-workspaces-in-minimal-environment',
        'status' => 'published',
    ]);

    $response = $this->get(route('home', ['search' => 'serif']));

    $response->assertStatus(200);
    $response->assertSee('Serif typography resurgence in 2026');
    $response->assertDontSee('Focused workspaces in minimal environment');
    $response->assertSee('Search results for');
});

test('authenticated user can search articles excluding their own', function () {
    $currentUser = User::factory()->create();
    $otherAuthor = User::factory()->create();
    $category = Category::create([
        'name' => 'General',
        'slug' => 'general',
    ]);

    Post::create([
        'user_id' => $currentUser->id,
        'category_id' => $category->id,
        'title' => 'Serif typography from current user',
        'content' => 'Lorem typography description own',
        'slug' => 'serif-typography-from-current-user',
        'status' => 'published',
    ]);

    Post::create([
        'user_id' => $otherAuthor->id,
        'category_id' => $category->id,
        'title' => 'Serif typography from another writer',
        'content' => 'Lorem typography description other',
        'slug' => 'serif-typography-from-another-writer',
        'status' => 'published',
    ]);

    $response = $this->actingAs($currentUser)->get(route('home', ['search' => 'serif']));

    $response->assertStatus(200);
    $response->assertSee('Serif typography from another writer');
    $response->assertDontSee('Serif typography from current user');
});

test('search empty state is displayed when no matches found', function () {
    $author = User::factory()->create();
    $category = Category::create([
        'name' => 'General',
        'slug' => 'general',
    ]);

    Post::create([
        'user_id' => $author->id,
        'category_id' => $category->id,
        'title' => 'Laravel guidelines',
        'content' => 'Lorem laravel description guidelines',
        'slug' => 'laravel-guidelines',
        'status' => 'published',
    ]);

    $response = $this->get(route('home', ['search' => 'nonexistentkeyword']));

    $response->assertStatus(200);
    $response->assertSee('No articles found');
});
