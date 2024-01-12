<?php

namespace App\Console\Commands;

use TimWassenburg\RepositoryGenerator\Console\MakeRepositoryInterface;

class MakeRepositoryInterfaceCommand extends MakeRepositoryInterface
{
    public function getStub()
    {
        return __DIR__.'/../../../stubs/repository-interface.stub';
    }
}
