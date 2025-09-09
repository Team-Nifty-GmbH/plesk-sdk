<?php

namespace TeamNifty\Plesk\Requests\Extensions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Enable extension
 */
class EnableExtension extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param  string  $id  Extension identifier
     */
    public function __construct(
        protected string $id,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function resolveEndpoint(): string
    {
        return "/extensions/{$this->id}/enable";
    }
}
