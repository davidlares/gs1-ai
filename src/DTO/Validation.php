<?php 

namespace Davidlares\GS1\DTO;

class Validation
{   
    /**
     * Constructor
     */
    public function __construct(
        public bool $fixed_length,
        public bool $is_optional,
        public bool $check_digit,
        public ?string $format,
        public bool $key,
        public ?int $length,
        public ?string $type
    ) {}
   
    /** 
     * Converting array data to object
     */
    public static function fromArray($data)
    {
        return new self(
            fixed_length: $data['fixed_length'] ?? false,
            is_optional: $data['is_optional'] ?? false,
            check_digit: $data['check_digit'] ?? false,
            format: $data['format'] ?? null,
            key: $data['key'] ?? false,
            length: $data['length'] ?? null,
            type: isset($data['type']) ? trim($data['type']) : null
        );
    }
}