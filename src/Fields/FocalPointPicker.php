<?php

namespace Johncarter\FilamentFocalPointPicker\Fields;

use Closure;
use Filament\Forms\Components\Field;

class FocalPointPicker extends Field
{
    protected string $view = 'filament-focal-point-picker::fields.focal-point-picker';

    protected bool $hasDefaultState = true;

    public string | Closure | null $image;

    public function image(string | Closure | null $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->evaluate($this->image);
    }
}
