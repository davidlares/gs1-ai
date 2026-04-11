<?php 

namespace Davidlares\GS1\AI\DTO;

class Identifier 
{
    /** 
     * Constructor 
     */
    public function __construct(
        public General $general,
        public Validations $validations,
        public Requirements $requirements,
        public Exclusions $exclusions,
        public Qualifiers $qualifiers
    ) {}

    /** 
     * Transforming the result to object
     */
    public static function fromArray($data) : self
    {
        // data object
        $data = $data['data'] ?? $data;
        // returning object
        return new self(
            general: General::fromArray($data['general']),
            validations: Validations::fromArray($data['validations'] ?? []),
            requirements: Requirements::fromArray($data['requires'] ?? []),
            exclusions: Exclusions::fromArray($data['exclusions'] ?? []),
            qualifiers: Qualifiers::fromArray($data['qualifiers'] ?? []),
        );
    }

    // Some public methods (public intended methods)

    /**
     * Contain Digital link qualifiers
     */
    public function containDigitalLinkQualifiers() : bool 
    {
        return $this->qualifiers->count() > 0;
    }

    /**
     * Number of validations found
     */
    public function amountOfvalidators() : int 
    {
        return $this->validations->count();
    }

    /**
     * Displaying if contain separator
     */
    public function containSeparator() : bool
    {
        return $this->general->separator;
    }

    /**
     * Displaying description
     */
    public function description() : ?string
    {
        return $this->general->description;
    }

    /**
     * Displaying regex
     */
    public function regex() : ?string 
    {
        return $this->general->regex;
    }

    /**
     * Displaying title
     */
    public function title() : ?string 
    {
        return $this->general->title;
    }

    /**
     * Displaying associated note
     */
    public function note() : ?string 
    {
        return $this->general->note;
    }

    /**
     * Displaying identifier
     */
    public function ai() : ?string
    {
        return $this->general->ai;
    }
}