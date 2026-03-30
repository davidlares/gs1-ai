<?php 

namespace Davidlares\GS1\DTO;

class Identifier 
{
    /** 
     * Converting raw data to array
     */
    public static function fromArray($data)
    {
        // data object
        $data = $data['data'] ?? $data;
        // returning an array
        return [
            'general' => General::fromArray($data['general'] ?? []),
            'validations' => Validations::fromArray($data['validations'] ?? null),
            'requires' => Requires::fromArray($data['requires'] ?? null),
            'exclusions' => Exclusions::fromArray($data['exclusions'] ?? null),
            'qualifiers' => Qualifiers::fromArray($data['qualifiers'] ?? null),
        ];
    }
}