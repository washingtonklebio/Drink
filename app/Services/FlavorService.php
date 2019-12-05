<?php

namespace App\Services;

use App\Models\Flavor;

class FlavorService extends Service
{
    public function __construct(Flavor $service)
    {
        parent::__construct($service);
    }

}