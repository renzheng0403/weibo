<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Status;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 验证当前用户的 id 与要删除的微博 id 是否相同
     */
    public function destroy(User $user, Status $status)
    {
        return $user->id === $status->user_id;
    }
}
