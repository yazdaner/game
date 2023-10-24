<?php

namespace Yazdan\Slider\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\User\App\Models\User;

class SliderPolicy
{
    use HandlesAuthorization;

    public function manage(User $user)
    {
        if($user->hasPermissionTo(PermissionRepository::PERMISSION_MANAGE_SLIDER)) return true;
    }


}
