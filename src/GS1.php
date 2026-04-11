<?php

namespace Davidlares\GS1\AI;

use Davidlares\GS1\AI\Services\IdentifierService;

class GS1
{
    protected $service;

    /**
     * Constructor
     */
    public function __construct(IdentifierService $service)
    {
        $this->service = $service;
    }

    /**
     * Find method for requesting an application identifier
     */
    public function find($identifier)
    {
        return $this->service->find($identifier);
    }
}