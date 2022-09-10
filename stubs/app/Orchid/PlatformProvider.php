<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param  Dashboard  $dashboard
     */
    public function boot(Dashboard $dashboard) : void
    {
        parent::boot($dashboard);
        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu() : array
    {
        return [
            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.users.list')
                ->permission('platform.users.list')
                ->title(__('Access rights')),

            Menu::make(__('Roles'))
                ->icon('lock')
                ->route('platform.roles.list')
                ->permission('platform.roles.list'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu() : array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions() : array
    {
        return [
            ItemPermission::group(__('User'))
                ->addPermission('platform.users.list', __('List'))
                ->addPermission('platform.users.edit', __('Edit')),
            ItemPermission::group(__('Role'))
                ->addPermission('platform.roles.list', __('List'))
                ->addPermission('platform.roles.edit', __('Edit')),
        ];
    }
}
