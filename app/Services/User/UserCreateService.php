<?php

namespace App\Services\User;

use App\Http\Requests\Auth\RegisterRequest;
use App\Interfaces\BaseServiceInterface;
use App\Models\User;

class UserCreateService implements BaseServiceInterface
{
    private RegisterRequest $request;
    private User $user;

    /**
     * UserCreateService constructor.
     * @param User $user
     * @param RegisterRequest $request
     */
    public function __construct(User $user, RegisterRequest $request)
    {
        $this->request = $request;
        $this->user = $user;
    }

    public function run(): bool
    {
        $this->user->username = $this->request->username;
        $this->user->email = $this->request->email;
        $this->user->password = bcrypt($this->request->password);

        return $this->user->save();
    }
}
