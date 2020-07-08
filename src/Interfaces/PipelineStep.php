<?php

namespace CoolStudio\LaravelImagePipeline\Interfaces;

use CoolStudio\LaravelImagePipeline\Classes\Image;

interface PipelineStep
{
    public static function step(Image $original, Image &$current);
}
