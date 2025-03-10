<?php

namespace Tests;

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\FolioServiceProvider;
use App\Providers\VoltServiceProvider;
use BezhanSalleh\FilamentShield\FilamentShieldServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\Attributes\WithEnv;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as BaseTestCase;
use TomatoPHP\FilamentAccounts\FilamentAccountsServiceProvider;
use TomatoPHP\FilamentSettingsHub\FilamentSettingsHubServiceProvider;
use TomatoPHP\FilamentTypes\FilamentTypesServiceProvider;

#[WithEnv('DB_CONNECTION', 'testing')]
abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;
    use WithWorkbench;

    protected function getPackageProviders($app): array
    {
        return [
            AppServiceProvider::class,
            AdminPanelProvider::class,
            FolioServiceProvider::class,
            VoltServiceProvider::class,
            FilamentTypesServiceProvider::class,
            FilamentSettingsHubServiceProvider::class,
            FilamentAccountsServiceProvider::class,
            FilamentShieldServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testing');

        $app['config']->set('view.paths', [
            ...$app['config']->get('view.paths'),
            __DIR__ . '/../resources/views',
        ]);
    }
}
