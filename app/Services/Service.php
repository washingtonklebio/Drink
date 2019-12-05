<?php

namespace App\Services;


class Service
{
    protected $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function getAll()
    {
        return $this->service->all();
    }

    public function save($data)
    {

        try {

            $newService = new $this->service;

            return $newService->create($data);

        } catch (\PDOException $e) {

            return false;
        }

    }

    public function update($id, $data) 
    {
        try {

            $newService = $this->service->find($id);

            if (!$newService) {
                return false;
            }

            return $newService->update($data);

        } catch(\PDOException $e) {

            return false; 
        }
    }

    public function destroy($id)
    {

        try {

            return $this->service->find($id)->delete();

        } catch (\PDOException $e) {

            return false;
        
        }
    }
}