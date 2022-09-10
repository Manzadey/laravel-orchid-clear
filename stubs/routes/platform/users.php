<?php

declare(strict_types=1);

// Platform > System > Users
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

Route::screen('', UserListScreen::class)
    ->name('list')
    ->breadcrumbs(static fn(Trail $trail) : Trail => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.users.list'))
    );

Route::screen('create', UserEditScreen::class)
    ->name('create')
    ->breadcrumbs(static fn(Trail $trail) : Trail => $trail
        ->parent('platform.users.list')
        ->push(__('Create'), route('platform.users.create'))
    );

Route::screen('{user}/edit', UserEditScreen::class)
    ->name('edit')
    ->breadcrumbs(static fn(Trail $trail, $user) : Trail => $trail
        ->parent('platform.users.list')
        ->push(__('User'), route('platform.users.edit', $user))
    );
