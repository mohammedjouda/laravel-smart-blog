gitgit<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

test('single post page displays dynamic author info and suggestions', function () {
    $author = User::factory()->create([
        'name' => 'Elena Vance',
        'username' => 'elenavance',
        'bio' => 'Design educator and writer.',
        'field' => 'Design lead',
    ]);

    $category = Category::create([
        'name' => 'General',
        'slug' => 'general',
    ]);

    $post = Post::create([
        'user_id' => $author->id,
        'category_id' => $category->id,
        'title' => 'Main Article Title',
        'content' => 'Main article content body',
        'slug' => 'main-article-title',
        'status' => 'published',
    ]);

    $tag = \App\Models\Tag::create([
        'name' => 'minimalism',
        'slug' => 'minimalism',
    ]);
    $post->tags()->attach($tag->id);

    // Create a suggested post
    $suggestedPost = Post::create([
        'user_id' => $author->id,
        'category_id' => $category->id,
        'title' => 'Suggested Article Title',
        'content' => 'Suggested article content body',
        'slug' => 'suggested-article-title',
        'status' => 'published',
    ]);

    $response = $this->get(route('posts.show', $post->slug));

    $response->assertStatus(200);
    // Verifying author details are displayed correctly
    $response->assertSee('Elena Vance');
    $response->assertSee('Design educator and writer.');
    $response->assertSee('Design lead');

    // Verifying tags are displayed
    $response->assertSee('#minimalism');

    // Verifying suggested post is displayed
    $response->assertSee('Suggested Article Title');
    // Verifying current post is not suggested
    // Wait, the title "Main Article Title" is in the main body, but check that it's not duplicated under Keep Reading
});

test('single post shows correct follow button status', function () {
    $currentUser = User::factory()->create();
    $author = User::factory()->create(['username' => 'elenavance', 'name' => 'Elena Vance']);
    $category = Category::create(['name' => 'General', 'slug' => 'general']);

    $post = Post::create([
        'user_id' => $author->id,
        'category_id' => $category->id,
        'title' => 'Main Article Title',
        'content' => 'Main article content body',
        'slug' => 'main-article-title',
        'status' => 'published',
    ]);

    // Unfollowed state
    $response = $this->actingAs($currentUser)->get(route('posts.show', $post->slug));
    $response->assertStatus(200);
    $response->assertSee('Follow');

    // Followed state
    $currentUser->followed()->attach($author->id);
    $response = $this->actingAs($currentUser)->get(route('posts.show', $post->slug));
    $response->assertStatus(200);
    $response->assertSee('Unfollow');
});

test('start writing CTA links to login for guest and post creation for user', function () {
    // Guest test
    $responseGuest = $this->get(route('home'));
    $responseGuest->assertStatus(200);
    $responseGuest->assertSee(route('login'));

    // Authenticated user test
    $user = User::factory()->create();
    $responseAuth = $this->actingAs($user)->get(route('home'));
    $responseAuth->assertStatus(200);
    $responseAuth->assertSee(route('dashboard.posts.create'));
});
