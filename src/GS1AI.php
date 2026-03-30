<?php

namespace Davidlares\GS1;

use Davidlares\GS1\Services\IdentifierService;

class GS1AI
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