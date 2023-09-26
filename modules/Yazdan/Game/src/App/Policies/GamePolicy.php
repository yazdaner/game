<?php

namespace Yazdan\Game\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\User\App\Models\User;

class GamePolicy
{
    use HandlesAuthorization;


    public function manage(User $user)
    {
        return $user->hasPermissionTo(PermissionRepository::PERMISSION_MANAGE_GAMES);
    }


}
