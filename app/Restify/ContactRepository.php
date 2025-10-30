<?php

namespace App\Restify;

use App\Models\Contact;
use App\Models\Organization;
use App\Restify\Repository;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\MCP\Concerns\HasMcpTools;


class ContactRepository extends Repository
{
    use HasMcpTools;

    public static string $model = Contact::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('first_name')->required()->searchable()->sortable()->rules('string','max:100'),
            field('last_name')->required()->rules('string','max:100'),
            field('email')->rules('nullable','email','max:255'),
            field('phone')->rules('nullable','string','max:50'),
            field('address')->rules('nullable','string','max:255'),
            field('city')->matchable()->rules('nullable','string','max:120'),
            field('province')->matchable()->rules('nullable','string','max:120'),
            field('country')->matchable()->rules('nullable','string','max:120'),
            field('postal_code')->rules('nullable','string','max:30'),

            field('organization_id')->required(),
        ];
    }

    public static function related(): array
    {
        return [
            'organization' => BelongsTo::make('organization', Organization::class),
        ];
    }

    public function mcpAllowsIndex(): bool  { return true; }
    public function mcpAllowsShow(): bool   { return true; }
    public function mcpAllowsStore(): bool  { return true; }
    public function mcpAllowsUpdate(): bool { return true; }
    public function mcpAllowsDelete(): bool { return true; }

    public static array $sort = ['first_name'];

    public static array $match = [
        'city' => 'string',
    ];
}
