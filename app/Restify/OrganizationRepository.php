<?php

namespace App\Restify;

use App\Models\Contact;
use App\Models\Organization;
use App\Restify\Repository;
use Binaryk\LaravelRestify\Fields\HasMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;


class OrganizationRepository extends Repository
{
    public static string $model = Organization::class;

    public function fields(RestifyRequest $request): array
    {

        return [
            id(),
            field('name')->required()->searchable()->sortable(),
            field('email')->email()->required(),
            field('phone')->required(),
            field('address')->required(),
            field('city')->required(),
            field('province')->required(),
            field('country')->required(),
            field('postal_code')->required()->numeric(),
        ];


    }

    public static function related(): array
    {
        return [
            'contacts' => HasMany::make('contacts', ContactRepository::class),
        ];
    }
}
