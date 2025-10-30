<?php

namespace App\Restify;

use App\Models\User;
use App\Restify\Repository;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;


class UserRepository extends Repository
{
    public static string $model = User::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('name')
                ->rules(['required', 'string', 'max:255'])
            ->messages([
                'required' => 'Please enter a name.',
            ]),
            field('name')->required(),
            field('email')->email()->required()->updatingRules('required', 'email')->storingRules('unique:users,email'),
            field('email_verified_at')->datetime()->readonly(),
            field('password')->password()->storingRules('required', 'password'),
            field('remember_token'),
            field('created_at')->datetime()->readonly(),
            field('updated_at')->datetime()->readonly(),
            field('avatar')->image()->storeAs('avatar.jpg')

        ];
    }
}
