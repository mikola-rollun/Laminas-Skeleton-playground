<?php

namespace App\Dto;

use rollun\datastore\DataStore\BaseDto;
use rollun\datastore\DataStore\Type\TypeInt;
use rollun\datastore\DataStore\Type\TypeString;

class OrderDto extends BaseDto
{
    const STATUS_INCOMPLETED = 'Incompleted';
    const STATUS_COMPLETED = 'Completed';

    protected $id;

    protected $status;
    
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
    
    public function getId()
    {
        $this->id->toTypeValue();
    }
    
    public function getName()
    {
        $this->name->toTypeValue();
    }
}
