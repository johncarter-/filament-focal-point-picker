<?php

namespace Johncarter\FilamentFocalPointPicker;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentFocalPointPickerServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-focal-point-picker')
            ->hasViews();
    }
}
