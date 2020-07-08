<?php

use CoolStudio\LaravelImagePipeline\Classes\Image;

return [
    'default' => env('LIP_Default', null),

    'pipelines' => [
    ],

    'apiKeys' => [
        'TinyPNG' => env('LIP_TinyPNG', null),
    ],
];
