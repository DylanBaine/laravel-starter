<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TimWassenburg\RepositoryGenerator\Console\MakeRepositoryInterface;

class MakeRepositoryInterfaceCommand extends MakeRepositoryInterface
{
    function getStub()
    {
        return __DIR__ . '/../../../stubs/repository-interface.stub';
    }
}
