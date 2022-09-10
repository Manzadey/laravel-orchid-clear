<?php

declare(strict_types=1);

use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

Route::screen('/main', PlatformScreen::class)
    ->name('platform.main')
    ->breadcrumbs(static fn(Trail $trail) : Trail => $trail
        ->parent('platform.index')
        ->push(__('Main Page'), route('platform.main'))
    );

Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(static fn(Trail $trail) : Trail => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile'))
    );

Route::name('platform.')
    ->group(static function() {
        Route::prefix('users')
            ->name('users.')
            ->group(base_path('routes/platform/users.php'));

        Route::prefix('roles')
            ->name('roles.')
            ->group(base_path('routes/platform/roles.php'));
    });
