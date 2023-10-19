<?php

namespace Yazdan\User\Repositories;

use Yazdan\Media\Services\MediaFileService;
use Yazdan\RolePermissions\Repositories\RoleRepository;
use Yazdan\User\App\Models\User;

class UserRepository
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_BAN = 'ban';

    static $statuses = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE,
        self::STATUS_BAN,
    ];


    const USER_SUPER_ADMIN = [
        'username' => 'admin',
        'email' => 'a@a.com',
        'password' => '1234',
        'role' => RoleRepository::ROLE_SUPER_ADMIN
    ];

    static $defaultUsers = [
        self::USER_SUPER_ADMIN,
    ];


    public $query;

    public function __construct()
    {
        $this->query = User::query();
    }

    public static function getUserByEmail($email)
    {
        return User::whereEmail($email)->first();
    }

    public static function findById($id)
    {
        return User::find($id);
    }



    public static function update($value, $userId)
    {
        $update = [
            'key' => $value->key,
            'name' => $value->name,
            'email' => $value->email,
            'username' => $value->username,
            'mobile' => $value->mobile,
            'status' => $value->status ?? UserRepository::STATUS_ACTIVE,
            'avatar_id' => $value->avatar_id,
        ];

        if ($value->password) {
            $update['password'] = bcrypt($value->password);
        }

        User::whereId($userId)->update($update);
    }

    public static function store($value)
    {
        User::create([
            'key' => $value->key,
            'name' => $value->name ?? null,
            'email' => $value->email,
            'username' => $value->username,
            'mobile' => $value->mobile ?? null,
            'status' => $value->status ?? UserRepository::STATUS_ACTIVE,
            'avatar_id' => $value->media_id ?? null,
            'password' => bcrypt($value->password),
        ]);
    }

    public static function upload($request, $userId)
    {
        $user = static::findById($userId);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                $user->avatar->delete();
            }
            $images = MediaFileService::publicUpload($request->avatar);
            return $request->request->add(['avatar_id' => $images->id]);
        } else {
            return $request->request->add(['avatar_id' => $user->avatar_id]);
        }
    }

    public static function updateProfile($value)
    {
        auth()->user()->name = $value->name;
        auth()->user()->mobile = $value->mobile;
        auth()->user()->username = $value->username;
        auth()->user()->save();
    }


    public function searchKey($key)
    {
        if (!is_null($key)) {
            $this->query->where("key", $key);
        }
        return $this;
    }

    public function searchEmail($email)
    {
        if (!is_null($email)) {
            $this->query->where("email", "like", "%" . $email . "%");
        }

        return $this;
    }

    public function searchName($name)
    {
        if (!is_null($name)) {
            $this->query->where("name", "like", "%" . $name . "%");
        }
        return $this;
    }

    public function paginateAlls()
    {
        return $this->query->latest()->paginate(20);
    }
}
