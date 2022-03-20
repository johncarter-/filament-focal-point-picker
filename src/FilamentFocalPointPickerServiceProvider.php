<?php

namespace Johncarter\FilamentFocalPointPicker;

use Spatie\LaravelPackageTools\Package;
use Filament\PluginServiceProvider;

class FilamentFocalPointPickerServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-focal-point-picker')
            ->hasConfigFile()
            ->hasViews();
    }
}
