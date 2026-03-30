<?php

namespace Davidlares\GS1\Facades;

use Illuminate\Support\Facades\Facade;
use Davidlares\GS1\GS1AI;

/**
 * @method static getIdentifier(string $identifier)
 */
class Identifier extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GS1AI::class;
    }
}