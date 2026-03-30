<?php 

namespace Davidlares\GS1\DTO;

class General 
{
    /** 
     * Converting raw data to array
     */
    public static function fromArray($data)
    {
        return [
            'ai' => $data['ai'] ?? '',
            'title' => $data['title'] ?? null,
            'description' => $data['description'] ?? null,
            'regex' => $data['regex'] ?? null,
            'separator' => $data['separator'] ?? false,
            'isDigitalLinkPrimaryKey' => $data['is_gs1_digital_link_pk'] ?? false,
            'isValidForDataAttributes' => $data['is_valid_for_data_attributes'] ?? false
        ];
    }
}