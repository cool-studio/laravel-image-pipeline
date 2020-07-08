<?php

namespace CoolStudio\LaravelImagePipeline\PipelineSteps\Demo;

use CoolStudio\LaravelImagePipeline\Classes\Image;
use CoolStudio\LaravelImagePipeline\Interfaces\PipelineStep;
use Illuminate\Support\Facades\Storage;

class Doubler implements PipelineStep
{
    public static function step(Image $original, Image &$current)
    {
        $disk = Storage::disk($current->driver);

        foreach ($current->filenames as $image) {
            $data = $disk->get($image);
            $newName = mt_rand(1, 1000) . $image;
            $disk->put($newName, $data);
            $current->filenames[] = $newName;
        }
    }
}
