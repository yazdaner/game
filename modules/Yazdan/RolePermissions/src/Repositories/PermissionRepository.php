<?php

namespace Yazdan\RolePermissions\Repositories;

use Spatie\Permission\Models\Permission;


class PermissionRepository
{

    const PERMISSION_MANAGE_CATEGORIES = 'manage categories';
    const PERMISSION_MANAGE_BLOG = 'manage blog';
    const PERMISSION_MANAGE_USERS = 'manage users';
    const PERMISSION_MANAGE_COIN = 'manage coin';
    const PERMISSION_MANAGE_COUPON = 'manage coupon';
    const PERMISSION_MANAGE_ROLE_PERMISSIONS = 'manage role permissions';
    const PERMISSION_MANAGE_PAYMENTS = 'manage payments';
    const PERMISSION_MANAGE_SETTLEMENTS = 'manage settlements';
    const PERMISSION_MANAGE_DISCOUNT = 'manage discounts';
    const PERMISSION_MANAGE_TICKETS = "manage tickets";
    const PERMISSION_MANAGE_COMMENTS = "manage comments";
    const PERMISSION_MANAGE_DASHBOARD = "manage dashboard";
    const PERMISSION_MANAGE_SLIDES = "manage slides";
    const PERMISSION_MANAGE_GAMES = 'manage games';
    const PERMISSION_MANAGE_LEVEL = 'manage level';
    const PERMISSION_MANAGE_GROUP = 'manage group';
    const PERMISSION_MANAGE_RECORD = 'manage record';
    const PERMISSION_MANAGE_SLIDER = 'manage slider';
    const PERMISSION_MANAGE_SETTING = 'manage setting';
    const PERMISSION_MANAGE_CONTACT = 'manage contact';
    const PERMISSION_MANAGE_ABOUT = 'manage about';

    static $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_MANAGE_RECORD,
        self::PERMISSION_MANAGE_BLOG,
        self::PERMISSION_MANAGE_CATEGORIES,
        self::PERMISSION_MANAGE_ROLE_PERMISSIONS,
        self::PERMISSION_MANAGE_USERS,
        self::PERMISSION_MANAGE_PAYMENTS,
        self::PERMISSION_MANAGE_SETTLEMENTS,
        self::PERMISSION_MANAGE_DISCOUNT,
        self::PERMISSION_MANAGE_TICKETS,
        self::PERMISSION_MANAGE_COMMENTS,
        self::PERMISSION_MANAGE_SLIDES,
        self::PERMISSION_MANAGE_DASHBOARD,
        self::PERMISSION_MANAGE_COIN,
        self::PERMISSION_MANAGE_COUPON,
        self::PERMISSION_MANAGE_GAMES,
        self::PERMISSION_MANAGE_LEVEL,
        self::PERMISSION_MANAGE_GROUP,
        self::PERMISSION_MANAGE_RECORD,
        self::PERMISSION_MANAGE_SLIDER,
        self::PERMISSION_MANAGE_SETTING,
        self::PERMISSION_MANAGE_CONTACT,
        self::PERMISSION_MANAGE_ABOUT,
    ];

    const PERMISSION_SUPER_ADMIN = 'super admin';


    public static function getAll()
    {
        return Permission::all();
    }
}
