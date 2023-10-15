<?php

namespace Yazdan\Regulation\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\User\App\Models\User;

class RegulationPolicy
{
    use HandlesAuthorization;

    public function manage(User $user)
    {
        return $user->hasPermissionTo(PermissionRepository::PERMISSION_MANAGE_REGULATION);
    }

}















