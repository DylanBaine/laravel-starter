<?php

namespace App\Console\Commands;

use TimWassenburg\RepositoryGenerator\Console\MakeRepository;

class MakeRepositoryCommand extends MakeRepository
{
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/../../../stubs/repository.stub';
    }
}
