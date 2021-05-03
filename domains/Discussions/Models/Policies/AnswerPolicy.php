<?php


namespace Domains\Discussions\Models\Policies;


use Domains\Accounts\Models\User;
use Domains\Discussions\Models\Answer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Answer $answer): bool
    {
        return $answer->author->is($user);
    }
}
