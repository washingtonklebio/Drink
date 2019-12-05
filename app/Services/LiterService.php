<?php

namespace App\Services;

use App\Models\Liter;

class LiterService extends Service
{
    public function __construct(Liter $service)
    {
        parent::__construct($service);
    }

}