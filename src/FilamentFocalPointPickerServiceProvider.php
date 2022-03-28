<?php

namespace Johncarter\FilamentFocalPointPicker;

use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentFocalPointPickerServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'filament-focal-point-picker' => __DIR__ . '/../resources/dist/css/filament-focal-point-picker.css',
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-focal-point-picker')
            ->hasAssets()
            ->hasViews()
            ->hasTranslations();
    }
}
