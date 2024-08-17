<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\ServiceProvider;
use Nette\Utils\Paginator as UtilsPaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("admin", function(User $user) {
            return $user->is_admin == 1;
        });

        Paginator::useBootstrap();
    }
}
