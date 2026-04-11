<?php 

namespace Davidlares\GS1\AI\DTO;

use Illuminate\Support\Collection; 

class Qualifiers extends Collection 
{ 
    /** 
     * Converting data into collection
     */
    public static function fromArray(?array $data) : self 
    { 
        if(empty($data))
            return new self();
        // or
        return new self(
            collect($data ?? [])
                ->map(fn ($item) => Qualifier::fromArray($item))
        ); 
    } 
}