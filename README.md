# Laravel Nova Signature

This [Nova](https://nova.laravel.com/) field lets you save a signature as a field for your resource.

Behind the scenes [WangShayne/vue-signature](https://github.com/WangShayne/vue-signature) is used.

![screenshot of nova signature](https://github.com/404labfr/nova-signature/raw/master/screenshots/signature.png?raw=true)

## Installation

`composer require lab404/nova-signature`

## Usage

In your nova resource make the field `Lab404\NovaSignature\NovaSignature`.
This field fits perfectly with a `TEXT` column and can be used both for resources and actions.

```php
public function fields()
{
    return [
        // ...
        NovaSignature::make('Signature'),
        // ...
    ];
}
```

## Configuration

Showed example values are the default ones.

```php
NovaSignature::make('Signature')
    ->color('black') // (string) Any css compatible value: "red", "rgb(0, 0, 0)", ...
    ->bgColor('white') // (string) Same as 'color'
    ->width('100%') // (string) Any css compatible value: "100%", "200px", ...
    ->height('250px') // (string) Same as 'width'
    ->saveOnChanges() // () Save the signature at every change and it will hide the Attach button
```

### Validation

You can use the `signature` validation rules to check if the signature is valid.
We also provide the `validSignature` method that adds `nullable` and `signature` rules.

```php
// With validSignature() 
NovaSignature::make('Signature')
    ->validSignature() // 'nullable' and 'signature' rules

// Your own rules
NovaSignature::make('Signature')
    ->rules('signature', ...) 
```

### Licence

MIT
