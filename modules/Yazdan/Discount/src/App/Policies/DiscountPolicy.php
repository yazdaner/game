<?php

namespace Yazdan\Discount\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Yazdan\Course\App\Models\Course;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\User\App\Models\User;

class DiscountPolicy
{
    use HandlesAuthorization;

    public function manage(User $user)
    {
        if($user->hasPermissionTo(PermissionRepository::PERMISSION_MANAGE_DISCOUNT)) return true;
    }



}
