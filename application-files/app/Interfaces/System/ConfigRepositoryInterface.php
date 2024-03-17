<?php

namespace App\Interfaces\System;

interface ConfigRepositoryInterface
{
    public function getAllData($data, $selectedColumns = [], $pagination = true);
    
    public function create($data);    

    public function update($config, $data);

    public function delete($request,$id);
}
