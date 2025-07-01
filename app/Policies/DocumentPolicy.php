<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Middleware\Authorize;

class DocumentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }

    public function view(User $user, Document $document): Response
    {
        if ($user->isAdmin() && $user->can('document.index') &&
            in_array($document->company_id, $user->assignedCompanies->pluck('id')->toArray())) {
            return Response::allow();
        }

        if ($user->id == $document->user_id) {
            return Response::allow();
        }

        return Response::deny(trans('context.errors.forbidden'));
    }

    public function update(User $user, Document $document): Response
    {
        return $this->view($user, $document);
    }

    public function delete(User $user, Document $document): Response
    {
        return $this->view($user, $document);
    }

}
