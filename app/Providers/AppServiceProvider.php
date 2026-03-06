<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Pluralizer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

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
        JsonResource::withoutWrapping();
        if ($this->app->environment('production')) {
            DB::prohibitDestructiveCommands();
        }
        Model::shouldBeStrict();
        Pluralizer::useLanguage('french');
    }
}
