<?php

namespace App\DataObjects;

class FileDTO 
{
    private string $name;

    public function __construct(
        $image
    ){
        $this->name = $image->getClientOriginalName();
    }

    public function getName() {
        return $this->name;
    }
}