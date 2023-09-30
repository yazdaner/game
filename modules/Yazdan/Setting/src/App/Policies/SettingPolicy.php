<?php

namespace Yazdan\Setting\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\User\App\Models\User;

class SettingPolicy
{
    use HandlesAuthorization;

    public function manage(User $user)
    {
        return $user->hasPermissionTo(PermissionRepository::PERMISSION_MANAGE_SETTING);
    }

}















