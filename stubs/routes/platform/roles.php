<?php

declare(strict_types=1);

use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

Route::screen('', RoleListScreen::class)
    ->name('list')
    ->breadcrumbs(static fn(Trail $trail) : Trail => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.roles.list'))
    );

Route::screen('create', RoleEditScreen::class)
    ->name('create')
    ->breadcrumbs(static fn(Trail $trail) : Trail => $trail
        ->parent('platform.roles.list')
        ->push(__('Create'), route('platform.roles.create'))
    );

Route::screen('{role}/edit', RoleEditScreen::class)
    ->name('edit')
    ->breadcrumbs(static fn(Trail $trail, $role) : Trail => $trail
        ->parent('platform.roles.list')
        ->push(__('Role'), route('platform.roles.edit', $role))
    );
