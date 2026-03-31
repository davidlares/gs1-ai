<?php 

namespace Davidlares\GS1\DTO;

class Qualifier
{
    /**
     * Constructor
     */
    public function __construct(
        public array $ais,
        public bool $isGroup
    ) {}

    /** 
     * Converting raw data to array
     */
    public static function fromArray($data)
    {
        if(!$data) 
            return null;
        // determining flat array 
        return is_array($data) ? new self($data, true) : new self([$data], false);
    }

    /**
     * Showing associated AIs
     */
    public function ais() : ?array
    {
        return $this->ais ?? [];
    }

    /**
     * Belongs to a group
     */
    public function belongsToGroup() : bool 
    {
        return $this->isGroup;
    }
}