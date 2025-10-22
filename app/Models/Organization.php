<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Organization extends Model
{
    protected $hidden = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'province',
        'country',
        'postal_code',
    ];

    public function contacts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public static function authorizedToUseRepository(Request $request): bool
    {
        return true;
    }

}
