
# An image focal point picker for Filament Admin.

A custom field for [Filament Admin](https://github.com/laravel-filament/filament). The field allows you to save a position on an image to act as its focal point, or focus. This can be used with the CSS `object-position` property to crop images on different aspect ratios.

The field returns a `string` with 2 percentages: distance from left, distance from top. e.g. `"17% 54%"`.

![Screenshot 2022-03-21 145935](https://user-images.githubusercontent.com/3776888/159289408-45103560-5ac3-47a1-9de9-82739d9c3445.png)


See this video for a demo: https://vimeo.com/690530672

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
FileUpload::make('my_image_field')->maxFiles(1),
FocalPointPicker::make('focal_point')
    ->default('10% 25%') // default: "50% 50%"
    ->image('my_image_field')
```

Then in your blade template:
```twig
<div class="aspect-w-16 aspect-h-5">
    <img src="{{ $myPageData['image'] }}" class="object-cover w-full h-full" style="object-position: {{ $myPageData['focal_point'] }}" />
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
