<?php

namespace Johncarter\FilamentFocalPointPicker\Fields;

use Closure;
use Filament\Forms\Components\Field;

class FocalPointPicker extends Field
{
    protected string $view = 'filament-focal-point-picker::fields.focal-point-picker';

    protected bool $hasDefaultState = true;

    public ?Closure $image;

    public function image(string | Closure | null $image): static
    {
        if (is_string($image)) {
            $this->image = function (Closure $get) use ($image) {
                $imageState = collect($get($image))?->first();

                if ($imageState instanceof TemporaryUploadedFile) {
                    return $imageState->temporaryUrl();
                }

                return is_string($imageState) ? asset('storage/' . $imageState) : null;
            };
        } else {
            $this->image = $image;
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->evaluate($this->image);
    }
}
