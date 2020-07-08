<?php

namespace CoolStudio\LaravelImagePipeline;

use CoolStudio\LaravelImagePipeline\Classes\Image;
use CoolStudio\LaravelImagePipeline\Interfaces\PipelineStep;
use Illuminate\Support\Facades\Log;

class Pipe
{
    private Image $original;
    private Image $current;

    public function __construct(string $driver, array $filenames, string $pipelineName = null)
    {
        if (is_null($pipelineName)) {
            $pipeline = config('image-pipelines.default');
            if (is_null($pipelineName)) {
                return;
            }
        }

        $pipeline = config("image-pipelines.pipelines.$pipelineName");

        if ($pipeline) {
            $this->original = new Image($driver, $filenames);
            $this->current = new Image($driver, $filenames);

            foreach ($pipeline as $pipelineStep) {
                try {
                    $pipelineStep::step($this->original, $this->current);
                } catch (\Exception $e) {
                    Log::error("Error in Pipeline: $pipelineName ~ $pipelineStep ~ {$e->getMessage()}", $e->getTrace());
                }
            }
        }
    }
}
