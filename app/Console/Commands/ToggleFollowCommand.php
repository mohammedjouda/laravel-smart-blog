<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('user:toggle-follow {follower} {followed}')]
#[Description('Toggle follow/unfollow status between two users')]
class ToggleFollowCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $followerUsername = $this->argument('follower');
        $followedUsername = $this->argument('followed');

        $follower = \App\Models\User::where('username', $followerUsername)->first();
        $followed = \App\Models\User::where('username', $followedUsername)->first();

        if (!$follower) {
            $this->error("Follower user with username '{$followerUsername}' not found.");
            return 1;
        }

        if (!$followed) {
            $this->error("Followed user with username '{$followedUsername}' not found.");
            return 1;
        }

        if ($follower->id === $followed->id) {
            $this->error("A user cannot follow themselves.");
            return 1;
        }

        if ($follower->followed()->where('followed_id', $followed->id)->exists()) {
            $follower->followed()->detach($followed->id);
            $this->info("Success: '{$follower->name}' (@{$follower->username}) has UNFOLLOWED '{$followed->name}' (@{$followed->username}).");
        } else {
            $follower->followed()->attach($followed->id);
            $this->info("Success: '{$follower->name}' (@{$follower->username}) is now FOLLOWING '{$followed->name}' (@{$followed->username}).");
        }

        return 0;
    }
}
