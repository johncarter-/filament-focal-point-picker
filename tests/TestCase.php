<?php

namespace Johncarter\FilamentFocalPointPicker\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Johncarter\FilamentFocalPointPicker\FilamentFocalPointPickerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Johncarter\\FilamentFocalPointPicker\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentFocalPointPickerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-focal-point-picker_table.php.stub';
        $migration->up();
        */
    }
}
