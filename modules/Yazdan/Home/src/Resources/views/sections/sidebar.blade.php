<!-- My Account Tab Menu Start -->
<div class="col-lg-3 col-md-4 my-5 my-md-1">
    <div class="myaccount-tab-menu nav" role="tablist">


        @foreach (config('sidebarHome.items') as $item)
        @if ($item)
        @if ( !array_key_exists('permission',$item) ||
        auth()->user()->hasAnyPermission($item['permission']) ||
        auth()->user()->hasPermissionTo(\Yazdan\RolePermissions\Repositories\PermissionRepository::PERMISSION_SUPER_ADMIN))


        <a href="{{$item['url']}}" class="{{ str_starts_with(request()->url(),$item['url']) ? 'active' : ''}}">
            <i class="{{$item['icon']}}"></i>
            {{$item['title']}}
        </a>

        @endif
        @endif
        @endforeach



    </div>
</div>
<!-- My Account Tab Menu End -->
