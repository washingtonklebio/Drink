<?php

namespace App\Services;

use App\Models\Refrigerant;

class RefrigerantService extends Service
{
    public function __construct(Refrigerant $service)
    {
        parent::__construct($service);
    }

    public function index()
    {
        return $this->service->with('flavor', 'type', 'liter')->get();
    }

    public function totalRefrigerant()
    {
        return $this->service->All()->sum('quantity');
    }
}