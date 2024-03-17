<?php

namespace App\Services\System;

use App\Exceptions\CustomGenericException;
use App\Exceptions\UnauthorizedException;
use App\Http\Requests\system\profileChangePasswordRequest;
use App\Mail\system\PasswordResetEmail;
use App\Mail\system\ProfileUpdateEmail;
use App\Repositories\System\UserRepository;
use App\Services\Service;
use App\Traits\ImageTrait;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;


class ProfileService extends Service
{

    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }

    public function indexPageData($data)
    {
        return [
            'item' => $this->repository->itemByIdentifier(authUser()->id),
        ];
    }

    public function update($request, $id)
    {
        try {
            if (authUser()->id != $id) {
                throw new Exception('Unauthorized action performed.');
            }
            $user = $this->repository->itemByIdentifier($id);
            $data = $request->only('name','email');
            $this->repository->update($user, $data);
            return $user;
        } catch (\Exception $e) {
            throw new CustomGenericException($e->getMessage());
        }
    }
}