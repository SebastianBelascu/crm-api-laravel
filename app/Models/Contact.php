<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Contact extends Model
{

    protected $hidden = [
        'first_name',
        'last_name',
        'organization',
        'email',
        'phone',
        'address',
        'city',
        'province',
        'country',
        'postal_code',
    ];

    public function organization(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public static function authorizedToUseRepository(Request $request): bool
    {
        return true;
    }
}
