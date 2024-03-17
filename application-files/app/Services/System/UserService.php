<?php

namespace App\Services\System;

use App\Events\UserCreated;
use App\Exceptions\CustomGenericException;
use App\Exceptions\NotDeletableException;
use App\Repositories\System\UserRepository;
use App\Services\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
    }

    public function indexPageData($request)
    {
        return [
            'items' => $this->repository->getAllData($request),
        ];
    }

    public function store($request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        DB::beginTransaction();
        $user = $this->repository->create($data);
        try {
            DB::commit();
            event(new UserCreated($user));
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            return throw new CustomGenericException('User creation failed. Please try again.');
        }
    }

    public function editPageData($request, $id)
    {
        $user = $this->repository->itemByIdentifier($id);
        return [
            'item' => $user,
        ];
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $user = $this->repository->itemByIdentifier($id);
            $this->repository->update($user, $data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomGenericException($e->getMessage());
        }
    }

    public function delete($request, $id)
    {
        if ($id == 1) {
            throw new NotDeletableException();
        }
        $user = $this->repository->itemByIdentifier($id);
        $this->repository->delete($request, $id);
        return $user;
    }

    public function findByEmail($email)
    {
        return $this->repository->findByEmail($email);
    }

    public function resetPassword($request)
    {
        return $this->repository->resetPassword($request);
    }
}
