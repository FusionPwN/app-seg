<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Lead;
use App\Models\Section;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
		$loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
		Relation::enforceMorphMap([
			'lead' 		=> Lead::class,
			'client' 	=> Client::class,
			'service'	=> Service::class,
			'section'	=> Section::class
		]);
    }
}
