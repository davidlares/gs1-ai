<?php 

namespace Davidlares\GS1\DTO;

use Illuminate\Support\Collection; 

class Validations extends Collection 
{ 
    /** 
     * Converting object into collection
     */
    public static function fromArray(array $data) : self 
    { 
        return new self(
            collect($data ?? [])
                ->map(fn ($item) => Validation::fromArray($item))
        ); 
    } 
}