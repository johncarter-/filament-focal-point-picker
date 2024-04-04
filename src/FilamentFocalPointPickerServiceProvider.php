<?php

namespace Johncarter\FilamentFocalPointPicker;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentFocalPointPickerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-focal-point-picker';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasAssets()
            ->hasViews()
            ->hasTranslations();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make(static::$name, __DIR__ . '/../resources/dist/filament-focal-point-picker.css')->loadedOnRequest(),
        ], 'johncarter/filament-focal-point-picker');
    }
}
