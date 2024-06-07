<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PHPUnit\Framework\Attributes\CodeCoverageIgnore;

class AppEnvServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // カバレッジレポートに含めない
        // @codeCoverageIgnoreStart
        if ($this->app->environment('local')) {
            $this->registerLocal();
        }
        // @codeCoverageIgnoreEnd

        if ($this->app->environment('testing')) {
            $result = $this->registerTesting();
            assert($result === true, 'registerTesting() must return true');
        }
    }

    #[CodeCoverageIgnore] private function registerLocal(): void
    {
        $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        $this->app->register(TelescopeServiceProvider::class);
    }

    // テスト用
    private function registerTesting(): bool
    {
        return $this->app->environment() === 'testing';
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
