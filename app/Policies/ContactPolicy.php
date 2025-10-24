<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Contact $model): bool
    {
        return true;
    }

    public function store(User $user): bool
    {
        return true;
    }

    public function storeBulk(User $user): bool
    {
        return false;
    }

    public function update(User $user, Contact $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, Contact $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Contact $model): bool
    {
        return false;
    }

    public function delete(User $user, Contact $model): bool
    {
        return true;
    }
}
