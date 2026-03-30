<?php 

namespace Davidlares\GS1\DTO;

class Exclusions
{
    /** 
     * Converting raw data to array
     */
    public static function fromArray($data)
    {
        if(!$data) 
            return null;
        // determining flat array 
        $isFlat = collect($data)->every(fn ($item) => !is_array($item));
        if($isFlat)
            return ExclusionsGroup::fromArray($data);
        else 
            return array_map(fn ($group) => ExclusionsGroup::fromArray($group), $data);
    }
}