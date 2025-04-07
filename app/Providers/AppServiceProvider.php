<?php

namespace App\Providers;

use App\Models\Kerjasama;
use App\Models\Pelanggan;
use App\Models\Requestmitra;
use App\Policies\KerjasamaPolicy;
use App\Policies\PelangganPolicy;
use App\Policies\RequestmitraPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Model::preventLazyLoading();
        Gate::policy(Pelanggan::class, PelangganPolicy::class);
        Gate::policy(Requestmitra::class, RequestmitraPolicy::class);
        Gate::policy(Kerjasama::class, KerjasamaPolicy::class);
    }
}
