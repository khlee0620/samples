<?php

namespace App\Console\Commands\Artisan;

// Model 생성시 Domains 디렉토리로 생성되게끔 path 설정
use Illuminate\Foundation\Console\ModelMakeCommand as Command;

class ModelMakeCommand extends Command
{
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\Domains";
    }
}
