<?php

namespace App\Policies;

use App\Models\Dependent;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DependentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Dependent $dependent): Response
    {
        if ($user->id == $dependent->supervisor_id) {
            return Response::allow();
        }

        return Response::deny(trans('context.errors.forbidden'));
    }

    public function update(User $user, Dependent $dependent): Response
    {
        return $this->view($user, $dependent);
    }

    public function delete(User $user, Dependent $dependent): Response
    {
        return $this->view($user, $dependent);
    }
}
