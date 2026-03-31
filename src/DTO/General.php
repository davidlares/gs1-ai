<?php 

namespace Davidlares\GS1\DTO;

class General 
{
    /**
     * Constructor
     */
    public function __construct(
        public string $ai,
        public string $title,
        public string $description,
        public ?string $note,
        public ?string $regex,
        public bool $separator,
        public bool $is_digital_link_primary_key,
        public bool $is_valid_for_data_attributes
    ) {}

    /** 
     * Transforming general information to object
     */
    public static function fromArray($data) : self
    {
        return new self(
            ai: $data['ai'] ?? '',
            title: $data['title'] ?? null,
            description: $data['description'] ?? null,
            note: $data['note'] ?? null,
            regex: $data['regex'] ?? null,
            separator: $data['separator'] ?? false,
            is_digital_link_primary_key: $data['is_gs1_digital_link_pk'] ?? false,
            is_valid_for_data_attributes: $data['is_valid_for_data_attributes'] ?? false
        );
    }

    // Additional methods

    /**
     * Digital link related
     * Is eligible for Digital link primary key?
     */
    public function canBeDigitalLinkPK() : bool
    {
        return $this->is_digital_link_primary_key;
    }

    /** 
     * Can be used as attribute for a PK?
     */
    public function isValidForDataAttributes() : bool 
    {
        return $this->is_valid_for_data_attributes;
    }
}