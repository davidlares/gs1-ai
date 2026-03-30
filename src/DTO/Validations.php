<?php 

namespace Davidlares\GS1\DTO;

class Validations
{
    /** 
     * Converting raw data to array
     */
    public static function fromArray($data)
    {
        return array_map(fn ($validation) => [
            'fixedLength' => $validation['fixed_length'] ?? false,
            'isOptional' => $validation['is_optional'] ?? false,
            'checkDigit' => $validation['check_digit'] ?? false,
            'key' => $validation['key'] ?? false,
            'format' => $validation['format'] ?? null,
            'length' => $validation['length'] ?? null,
            'type' => isset($validation['type']) ? trim($validation['type']) : null
        ], $data);
    }
}