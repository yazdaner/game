<?php

namespace Yazdan\Contact\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\User\App\Models\User;

class ContactPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        if($user->hasPermissionTo(PermissionRepository::PERMISSION_MANAGE_CONTACT)) return true;
    }


}
