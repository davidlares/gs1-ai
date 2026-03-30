<?php 

namespace Davidlares\GS1\Client;

use Davidlares\GS1\Contracts\ClientInterface;
use Illuminate\Support\Facades\Http;
use Exception;

class GS1Client implements ClientInterface
{
    protected $baseUrl;

    /**
     * Constructor
     */
    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * Requesting an Identifier to API
     */
    public function getIdentifier($identifier)
    {
        $response = Http::get($this->baseUrl . '/identifiers/' . $identifier);
        // evaluation
        if ($response->failed()) 
            throw new Exception("API request failed. Identifier not found");
        // returning response
        return $response->json();
    }
}