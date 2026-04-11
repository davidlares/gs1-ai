<?php 

namespace Davidlares\GS1\AI\DTO;

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

    // Some related methods

    /**
     * Contain a check digit
     */
    public function containCheckDigit() : bool 
    {
        return $this->check_digit;
    }

    /**
     * Contain a fixed length
     */
    public function isFixedLength() : bool 
    {
        return $this->fixed_length;
    }

    /**
     * Is primary key
     */
    public function isPrimaryKey() : bool 
    {
        return $this->key;
    }

    /**
     * Check for the type
     */
    public function type() : string 
    {
        if(trim($this->type) == "N")
            return "numeric";
        else if(trim($this->type) == "X")
            return "alphanumeric";
        else 
            return "N/A";
    }

    /**
     * Is optional?
     */
    public function isOptional() : bool 
    {
        return $this->is_optional;
    }

    /**
     * Retrieving the format
     */
    public function format() : string 
    {
        return $this->format ?? "N/A";
    }

    /**
     * Length
     */
    public function length() : ?int
    {
        return $this->length;
    }
}