<?php

namespace App\Restify;

use App\Models\Contact;
use App\Models\Organization;
use App\Restify\Repository;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;


class ContactRepository extends Repository
{
    public static string $model = Contact::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('first_name')->required(),
            field('last_name')->required(),
            field('email')->email()->required(),
            field('phone')->required(),
            field('address')->required(),
            field('city')->required(),
            field('province')->required(),
            field('country')->required(),
            field('postal_code')->required(),

            field('organization_id')->required(),
        ];
    }

    public static function related(): array
    {
        return [
            'organization' => BelongsTo::make('organization', Organization::class),
        ];
    }
}
