<?php

namespace hisorange\BrowserDetect;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Registers the package as a service provider,
 * also injects the blade directives.
 *
 * @package hisorange\BrowserDetect
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the custom blade directives.
     *
     * @inheritDoc
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerDirectives();

        $this->publishes([
            __DIR__ . '/../config/browser-detect.php' => config_path('browser-detect.php'),
        ]);
    }

    /**
     * Register the blade directives.
     */
    protected function registerDirectives(): void
    {
        Blade::if(
            'desktop',
            function () {
                return app()->make('browser-detect')->detect()->isDesktop();
            }
        );

        Blade::if(
            'tablet',
            function () {
                return app()->make('browser-detect')->detect()->isTablet();
            }
        );

        Blade::if(
            'mobile',
            function () {
                return app()->make('browser-detect')->detect()->isMobile();
            }
        );

        Blade::if(
            'browser',
            function ($fn) {
                return app()->make('browser-detect')->detect()->$fn();
            }
        );
    }

    /**
     * Only binding can occure here!
     *
     * @inheritdoc
     */
    public function register(): void
    {
        $this->app->singleton('browser-detect', function ($app) {
            return new Parser($app->make('cache'), $app->make('request'), $app->make('config')['browser-detect'] ?? []);
        });
    }
}
