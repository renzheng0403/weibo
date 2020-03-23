<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * 用户授权，检测两个用户 id 是否相同
     * @param User $currentUser 当前登录用户实例
     * @param User $user 要进行授权的用户实例
     * @return bool
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
