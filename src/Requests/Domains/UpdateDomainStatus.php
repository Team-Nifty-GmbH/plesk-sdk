<?php

namespace TeamNifty\Plesk\Requests\Domains;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\DomainStatus;
use TeamNifty\Plesk\Enums\DomainStatusStatus;

/**
 * Update a Domain status
 */
class UpdateDomainStatus extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param  int  $id  Domain ID
     * @param  DomainStatusStatus  $status  Status of the specified domain.
     */
    public function __construct(
        protected int $id,
        protected DomainStatusStatus $status,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return DomainStatus::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter(['status' => $this->status->value]);
    }

    public function resolveEndpoint(): string
    {
        return "/domains/{$this->id}/status";
    }
}
