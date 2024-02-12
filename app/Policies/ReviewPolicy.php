<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Review;

use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the review.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $review
     * @return bool
     */
    public function delete(User $user, Review $review)
    {
        // Check if the user owns the review
        return $user->id == $review->user_id;
    }
}
