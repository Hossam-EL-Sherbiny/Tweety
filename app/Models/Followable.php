<?php


namespace App\Models;


trait Followable
{

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    // $user->toggleFollow($otherUser);
    public function toggleFollow(User $user)
    {
        // if the authenticated user is following that person, then unfollow them.
        $this->follows()->toggle($user);
    }

    public function following(User $user)
    {
        // you can get the collections everOne user follows and check if that contain the given user.
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id');
    }

}
