<?php

namespace Yazdan\User\App\Http\Controllers;

use Yazdan\User\App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\User\Repositories\UserRepository;
use Yazdan\User\App\Http\Requests\AddRoleRequest;
use Yazdan\User\App\Http\Requests\UserRequest;
use Yazdan\RolePermissions\Repositories\RoleRepository;
use Yazdan\User\App\Http\Requests\UpdateProfileRequest;
use Yazdan\User\App\Http\Requests\UpdateUserPhotoRequest;

class UserController extends Controller
{

    public function index(UserRepository $repo)
    {
        $this->authorize('index', User::class);

        $users = $repo
            ->searchKey(request("key"))
            ->searchEmail(request("email"))
            ->searchName(request("name"));

        $roles = RoleRepository::getAll();
        $users = $users->paginateAlls();
        return view('User::admin.index', compact("users", 'roles'));
    }

    public function edit(User $user)
    {
        $this->authorize('edit', User::class);
        $statuses = UserRepository::$statuses;
        return view('User::admin.edit', compact('user', 'statuses'));
    }

    public function update(UserRequest $request, $userId)
    {
        $this->authorize('edit', User::class);

        UserRepository::upload($request, $userId);
        UserRepository::update($request, $userId);

        newFeedbacks();
        return redirect()->route('admin.users.index');
    }

    public function destroy($userId)
    {
        $this->authorize('delete', User::class);
        $user = UserRepository::findById($userId);

        if ($user->avatar) {
            $user->avatar->delete();
        }
        $user->delete();

        return AjaxResponses::SuccessResponses();
    }

    public function addRole(AddRoleRequest $request, User $user)
    {
        $this->authorize('addRole', User::class);
        $user->assignRole($request->role);
        newFeedbacks('با موفقیت', "نقش مورد نظر به کاربر {$user->username} داده شد", 'success');
        return redirect()->route('admin.users.index');
    }

    public function removeRole(User $user, Role $role)
    {
        $this->authorize('removeRole', User::class);
        $user->removeRole($role->id);
        return AjaxResponses::SuccessResponses();
    }

    public function manualVerify(User $user)
    {
        $this->authorize('manualVerify', User::class);
        $user->markEmailAsVerified();
        return AjaxResponses::SuccessResponses();
    }

    public function updatePhoto(UpdateUserPhotoRequest $request)
    {
        $this->authorize('updatePhoto', User::class);

        $image = MediaFileService::publicUpload($request->image);
        if ($image == false) {
            newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
            return back();
        }
        if (auth()->user()->avatar) auth()->user()->avatar->delete();
        auth()->user()->avatar_id = $image->id;
        auth()->user()->save();
        newFeedbacks();
        return back();
    }

    public function profile()
    {
        $this->authorize('profile', User::class);
        return view('User::profile.index');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $this->authorize('profile', User::class);
        UserRepository::updateProfile($request);
        newFeedbacks();
        return back();
    }

    public function memberCard()
    {
        $this->authorize('profile', User::class);
        return view('User::profile.memberCard');
    }


    public function create()
    {
        $this->authorize('edit', User::class);
        $statuses = UserRepository::$statuses;
        return view('User::admin.create',compact('statuses'));
    }
    public function store(UserRequest $request)
    {
        $this->authorize('edit', User::class);
        if (isset($request->media)) {
            $images = MediaFileService::publicUpload($request->media);
            if ($images == false) {
                newFeedbacks('نا موفق', 'فرمت فایل نامعتبر میباشد', 'error');
                return back();
            }
            $request->request->add(['media_id' => $images->id]);
        }
        UserRepository::store($request);

        newFeedbacks();
        return redirect()->route('admin.users.index');
    }


    public function show(User $user)
    {
        $coupons = $user->coupons()->get();
        return view('User::admin.show',compact('user','coupons'));
    }
}
