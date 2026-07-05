<?php

use App\Models\User;

test('a user can follow another user', function () {
    $follower = User::factory()->create();
    $followed = User::factory()->create();

    $response = $this->actingAs($follower)->post(route('follow', $followed->username));

    $response->assertSessionHas('status');
    $this->assertDatabaseHas('follows', [
        'follower_id' => $follower->id,
        'followed_id' => $followed->id,
    ]);

    expect($follower->followed()->count())->toBe(1);
    expect($followed->followers()->count())->toBe(1);
});

test('a user cannot follow themselves', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('follow', $user->username));

    $response->assertSessionHas('error', 'You cannot follow yourself.');
    $this->assertDatabaseMissing('follows', [
        'follower_id' => $user->id,
        'followed_id' => $user->id,
    ]);
});

test('duplicate follow requests are prevented', function () {
    $follower = User::factory()->create();
    $followed = User::factory()->create();

    // First follow
    $this->actingAs($follower)->post(route('follow', $followed->username));
    
    // Second follow
    $this->actingAs($follower)->post(route('follow', $followed->username));

    expect($follower->followed()->count())->toBe(1);
    expect($followed->followers()->count())->toBe(1);
});

test('a user can unfollow another user', function () {
    $follower = User::factory()->create();
    $followed = User::factory()->create();

    $follower->followed()->attach($followed->id);

    $response = $this->actingAs($follower)->post(route('unfollow', $followed->username));

    $response->assertSessionHas('status');
    $this->assertDatabaseMissing('follows', [
        'follower_id' => $follower->id,
        'followed_id' => $followed->id,
    ]);

    expect($follower->followed()->count())->toBe(0);
    expect($followed->followers()->count())->toBe(0);
});

test('toggle follow console command works', function () {
    $follower = User::factory()->create(['username' => 'testfollower']);
    $followed = User::factory()->create(['username' => 'testfollowed']);

    // Toggle follow on (should now follow)
    $this->artisan('user:toggle-follow testfollower testfollowed')
        ->expectsOutput("Success: '{$follower->name}' (@testfollower) is now FOLLOWING '{$followed->name}' (@testfollowed).")
        ->assertExitCode(0);

    $this->assertDatabaseHas('follows', [
        'follower_id' => $follower->id,
        'followed_id' => $followed->id,
    ]);

    // Toggle follow off (should now unfollow)
    $this->artisan('user:toggle-follow testfollower testfollowed')
        ->expectsOutput("Success: '{$follower->name}' (@testfollower) has UNFOLLOWED '{$followed->name}' (@testfollowed).")
        ->assertExitCode(0);

    $this->assertDatabaseMissing('follows', [
        'follower_id' => $follower->id,
        'followed_id' => $followed->id,
    ]);
});

test('UI states are correctly loaded', function () {
    $currentUser = User::factory()->create(['username' => 'current']);
    $otherUser = User::factory()->create(['username' => 'other']);

    // Current user follows other user
    $currentUser->followed()->attach($otherUser->id);
    
    // Other user follows current user (mutual follow)
    $otherUser->followed()->attach($currentUser->id);

    $response = $this->actingAs($currentUser)->get('/authors');

    $response->assertStatus(200);
    $response->assertSee('Follows you');
    $response->assertSee('Unfollow');

    $responseProfile = $this->actingAs($currentUser)->get('/profile/other');
    $responseProfile->assertStatus(200);
    $responseProfile->assertSee('Follows you');
    $responseProfile->assertSee('Unfollow');
});

test('writer follow component displays other users and correct follow button status', function () {
    $currentUser = User::factory()->create();
    $otherUser = User::factory()->create(['name' => 'John Doe']);
    
    // Follow the other user
    $currentUser->followed()->attach($otherUser->id);

    $response = $this->actingAs($currentUser)->get(route('home'));

    $response->assertStatus(200);
    $response->assertSee('John Doe');
    $response->assertSee('Following');
});
