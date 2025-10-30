<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{

    use HasFactory;
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
