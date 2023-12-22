<?php

namespace Johncarter\FilamentFocalPointPicker;

use Filament\Panel;


class FilamentFocalPointPicker implements \Filament\Contracts\Plugin
{

    public function getId(): string
    {
        return 'Johncarter-filament-focal-point-picker';
    }
    public function register(Panel $panel):void
    {
    }
    public function boot(Panel $panel): void
    {

    }
}
