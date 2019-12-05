<?php

namespace App\Services;

use App\Models\Type;

class TypeService extends Service
{
    public function __construct(Type $service)
    {
        parent::__construct($service);
    }

}