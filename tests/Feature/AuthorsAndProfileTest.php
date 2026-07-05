<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Category;

test('authors page displays list of authors', function () {
    $author = User::factory()->create([
        'name' => 'Elena Vance',
        'username' => 'elenavance',
        'email_verified_at' => now(),
    ]);

    $response = $this->get('/authors');

    $response->assertStatus(200);
    $response->assertSee('Elena Vance');
});

test('authors page filters by search query', function () {
    $author1 = User::factory()->create([
        'name' => 'Elena Vance',
        'username' => 'elenavance',
    ]);
    $author2 = User::factory()->create([
        'name' => 'Julian Thorne',
        'username' => 'julianthorne',
    ]);

    $response = $this->get('/authors?search=Elena');

    $response->assertStatus(200);
    $response->assertSee('Elena Vance');
    $response->assertDontSee('Julian Thorne');
});

test('public profile page shows user details and posts', function () {
    $user = User::factory()->create([
        'name' => 'Sasha Greyer',
        'username' => 'sashagreyer',
        'field' => 'Culture Critic',
        'bio' => 'Culture critic and essayist.',
    ]);

    $category = Category::create([
        'name' => 'Culture',
        'slug' => 'culture',
    ]);

    $post = Post::create([
        'user_id' => $user->id,
        'category_id' => $category->id,
        'title' => 'Nuances of Suburban Architecture',
        'content' => 'Lorem ipsum content',
        'slug' => 'nuances-of-suburban-architecture',
        'excerpt' => 'Culture critic and essayist.',
        'status' => 'published',
    ]);

    $response = $this->get('/profile/sashagreyer');

    $response->assertStatus(200);
    $response->assertSee('Sasha Greyer');
    $response->assertSee('@ sashagreyer');
    $response->assertSee('Culture Critic');
    $response->assertSee('Culture critic and essayist.');
    $response->assertSee('Nuances of Suburban Architecture');
});

test('profile page redirects guest to login', function () {
    $response = $this->get('/profile');

    $response->assertRedirect(route('login'));
});

test('profile page shows authenticated user profile', function () {
    $user = User::factory()->create([
        'name' => 'Authenticated Writer',
        'username' => 'authwriter',
    ]);

    $response = $this->actingAs($user)->get('/profile');

    $response->assertStatus(200);
    $response->assertSee('Authenticated Writer');
    $response->assertSee('@ authwriter');
});
