<?php

namespace Lab404\NovaSignature;

use Illuminate\Support\Facades\Validator;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('signature', function ($attribute, $value, $parameters, $validator) {
            return $value && substr($value, 0, 11) === 'data:image/';
        });

        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-signature', __DIR__.'/../dist/js/field.js');
        });
    }

    public function register()
    {
        //
    }
}
