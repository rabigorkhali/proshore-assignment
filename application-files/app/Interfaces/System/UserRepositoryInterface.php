<?php

namespace App\Interfaces\System;

interface UserRepositoryInterface
{
    public function getAllData($data, $selectedColumns = [], $pagination = true);

    public function create($userData);

    public function update($id, $userData);

    public function delete($request, $id);

    public function resetPassword($data);

    public function findByEmail($email);

}
