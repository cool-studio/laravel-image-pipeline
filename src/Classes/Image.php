<?php

namespace CoolStudio\LaravelImagePipeline\Classes;

use Illuminate\Support\Facades\Storage;

class Image
{
    public string $driver;
    public array $filenames;

    public function __construct(string $driver, array $filenames)
    {
        $this->driver = $driver;
        $this->filenames = $filenames;
    }
}
