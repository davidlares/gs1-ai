<?php 

namespace Davidlares\GS1\AI\Services;

use Davidlares\GS1\AI\Contracts\ClientInterface;
use Illuminate\Support\Facades\Cache;
use Davidlares\GS1\AI\DTO\Identifier;

class IdentifierService
{
    protected $client;

    /**
     * Constructor
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client; 
    }

    /**
     * Find identifier
     */
    public function find($identifier)
    {
        $key = "gs1.identifier.{$identifier}";
        // returning with cache
        return Cache::remember($key, config('gs1.cache_ttl'), function() use ($identifier) {
            // requesting the identifier
            $data = $this->client->getIdentifier($identifier);
            // returning with format
            return Identifier::fromArray($data);
        });
    }
}