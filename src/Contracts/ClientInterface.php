<?php 

namespace Davidlares\GS1\Contracts;

interface ClientInterface 
{
    public function getIdentifier(string $identifier);
}