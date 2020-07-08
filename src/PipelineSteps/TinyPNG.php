<?php

namespace CoolStudio\LaravelImagePipeline\PipelineSteps;

use CoolStudio\LaravelImagePipeline\Classes\Image;
use CoolStudio\LaravelImagePipeline\Interfaces\PipelineStep;
use Illuminate\Support\Facades\Storage;

use function Tinify\fromBuffer;
use function Tinify\setKey;

class TinyPNG implements PipelineStep
{
    public static function step(Image $original, Image &$current)
    {
        setKey(config('image-pipelines.apiKeys.TinyPNG'));
        $disk = Storage::disk($current->driver);

        foreach ($current->filenames as $image) {
            $data = fromBuffer($disk->get($image))->toBuffer();
            $disk->put($image, $data);
        }
    }
}
