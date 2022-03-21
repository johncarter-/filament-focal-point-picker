
# An image focal point picker for Filament Admin.

A custom field for [Filament Admin](https://github.com/laravel-filament/filament). The field allows you to save a position on an image to act as its focal point, or focus. This can be used with the CSS `object-position` property to crop images on different aspect ratios.

The field returns a `string` with 2 percentages: distance from left, distance from top. e.g. `"17% 54%"`.

## Installation

You can install the package via composer:

```bash
composer require johncarter/filament-focal-point-picker
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-focal-point-picker-views"
```

## Usage

```php
FileUpload::make('image')->maxFiles(1),
FocalPointPicker::make('focal_point')
    ->default('50% 50%')
    ->reactive()
    ->image(function (Closure $get) {
        $imageState = collect($get('image'))?->first();

        if ($imageState instanceof TemporaryUploadedFile) {
            return $imageState->temporaryUrl();
        }

        return is_string($imageState) ? asset('storage/' . $imageState) : null;
    })
```

Then in your blade template:
```twig
<div class="aspect-w-16 aspect-h-5">
    <img src="{{ $myPageData['image'] }}" class="object-cover h-full w-full" style="object-position: {{ $myPageData['focal_point'] }}" />
</div>
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [John Carter](https://github.com/johncarter)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
