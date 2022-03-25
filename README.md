
# An image focal point picker for Filament Admin.

A custom field for [Filament Admin](https://github.com/laravel-filament/filament). The field allows you to save a position on an image to act as its focal point, or focus. This can be used with the CSS `object-position` property to crop images on different aspect ratios.

The field returns a `string` with 2 percentages: distance from left, distance from top. e.g. `"17% 54%"`.

![](https://videoapi-muybridge.vimeocdn.com/animated-thumbnails/image/f888acf2-87a2-4ac5-95c4-eab9a80175ce.gif?ClientID=vimeo-core-prod&Date=1647882425&Signature=cce12ab8b760d269a1b3a3e1d88a60ff43b8bc6c)

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
    ->imageField('my_image_field')
    // Or, return an image url from a closure on the image() method
    // ->image(function() {
    //     return 'https://www.example.com/images/image1.jpg'
    // })
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
