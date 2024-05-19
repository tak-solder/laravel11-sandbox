<?php

namespace Tests\Unit\Console\Commands;

use Tests\TestCase;

class IdeHelperTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_local_env(): void
    {
        $this->app->detectEnvironment(fn () => 'local');
        $this->artisan('ide-helper:run')
            ->doesntExpectOutput('"ide-helper:run" is only works in local environment')
            ->assertExitCode(0);
    }

    public function test_other_env(): void
    {
        $this->assertNotEquals('local', $this->app->environment());
        $this->artisan('ide-helper:run')
            ->expectsOutput('"ide-helper:run" is only works in local environment')
            ->assertExitCode(0);
    }
}
