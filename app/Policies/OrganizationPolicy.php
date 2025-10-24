<?php

namespace App\Policies;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Organization $model): bool
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

    public function update(User $user, Organization $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, Organization $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Organization $model): bool
    {
        return false;
    }

    public function delete(User $user, Organization $model): bool
    {
        return true;
    }
}
