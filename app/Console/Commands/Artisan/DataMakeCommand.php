<?php

namespace App\Console\Commands\Artisan;

use Illuminate\Support\Str;
use Spatie\LaravelData\Commands\DataMakeCommand as Command;

class DataMakeCommand extends Command
{
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\Dtos";
    }
}
