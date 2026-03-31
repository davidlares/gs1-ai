<?php 

namespace Davidlares\GS1\DTO;

use Illuminate\Support\Collection; 

class Requirements extends Collection 
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
                ->map(fn ($item) => Requirement::fromArray($item))
        ); 
    } 
}