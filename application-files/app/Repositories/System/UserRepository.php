<?php

namespace App\Repositories\System;

use App\Exceptions\ResourceNotFoundException;
use App\Interfaces\System\UserRepositoryInterface;
use App\Repositories\Repository;
use App\Model\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getAllData($data, $selectedColumns = [], $pagination = true)
    {
        $query = $this->query();

        if (isset($data->keyword)) {
            $query->where(function ($q) use ($data) {
                $q->orwhere('name', 'LIKE', '%' . $data->keyword . '%')
                    ->orwhere('email', 'LIKE', '%' . $data->keyword . '%');
            });
        }


        if (count($selectedColumns) > 0) {
            $query->select($selectedColumns);
        }

        if ($pagination) {
            return $query->orderBy('id', 'DESC')->paginate(paginate());
        }

        return $query->orderBy('id', 'DESC')->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($user, $data)
    {
        return $user->update($data);
    }

    public function delete($request, $id)
    {
        $user = $this->itemByIdentifier($id);
        return $user->delete();
    }


    public function resetPassword($request)
    {
        $user = $this->itemByIdentifier($request->id);
        return $user->update([
            'password' => Hash::make($request->password),
        ]);
    }

    public function findByEmail($email)
    {
        $user = $this->model->where('email', $email)->first();
        if (!isset($user)) {
            throw new ResourceNotFoundException("User doesn't exist in our system.");
        }
        return $user;
    }
}
