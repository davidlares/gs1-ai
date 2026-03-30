<?php 

namespace Davidlares\GS1\DTO;

class Qualifiers
{
    /** 
     * Converting raw data to array
     */
    public static function fromArray($data)
    {
        if(!$data) 
            return null;
        // mapping for group associations
        return array_map(fn ($group) => QualifiersGroup::fromArray($group), $data);
    }
}