<?php

namespace Davidlares\GS1\AI\Facades;

use Illuminate\Support\Facades\Facade;
use Davidlares\GS1\AI\GS1;

/**
 * @method static getIdentifier(string $identifier)
 */
class Identifier extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GS1::class;
    }
}