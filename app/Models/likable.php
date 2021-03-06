<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Builder;

trait likable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislike from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function isDisLikedBy(User $user)
    {
        return (bool)
        $user
            ->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return (bool)
        $user
            ->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)->count();
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->UpdateOrcreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'liked' => $liked
        ]);
    }
}
