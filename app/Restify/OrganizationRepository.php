<?php

namespace App\Restify;

use App\Models\Contact;
use App\Models\Organization;
use App\Restify\Repository;
use Binaryk\LaravelRestify\Fields\HasMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\MCP\Concerns\HasMcpTools;


class OrganizationRepository extends Repository
{
    use HasMcpTools;


    public static string $model = Organization::class;

    public function fields(RestifyRequest $request): array
    {

        return [
            id(),
            field('name')->required()->searchable()->sortable()->rules('string','max:150'),
            field('address')->rules('nullable','string','max:255'),
            field('city')->rules('nullable','string','max:120'),
            field('province')->rules('nullable','string','max:120'),
            field('country')->rules('nullable','string','max:120'),
            field('postal_code')->rules('nullable','string','max:30'),
        ];
    }

        public function mcpAllowsIndex(): bool  { return true; }
        public function mcpAllowsShow(): bool   { return true; }
        public function mcpAllowsStore(): bool  { return true; }
        public function mcpAllowsUpdate(): bool { return true; }
        public function mcpAllowsDelete(): bool { return true; }


    public static function related(): array
    {
        return [
            'contacts' => HasMany::make('contacts', ContactRepository::class),
        ];
    }

    public static array $sort = ['name'];
    public static array $match = [
        'city' => 'string',
    ];

}
