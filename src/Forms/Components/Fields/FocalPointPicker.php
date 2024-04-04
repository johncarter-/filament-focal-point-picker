<?php

namespace Johncarter\FilamentFocalPointPicker\Forms\Components\Fields;

use Closure;
use Filament\Forms\Components\Field;
use Filament\Forms\Get;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FocalPointPicker extends Field
{
    protected string $view = 'filament-focal-point-picker::forms.components.fields.focal-point-picker';

    protected bool $hasDefaultState = true;

    public ?Closure $image = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->default('50% 50%');
    }

    public function imageField(string $field): static
    {
        return $this->image(function (Get $get) use ($field) {
            $imageState = collect($get($field))?->first();

            if ($imageState instanceof TemporaryUploadedFile) {
                return $imageState->temporaryUrl();
            }

            return is_string($imageState) ? Storage::url($imageState) : null;
        });
    }

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
