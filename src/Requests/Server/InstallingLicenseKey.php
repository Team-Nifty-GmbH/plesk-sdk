<?php

namespace TeamNifty\Plesk\Requests\Server;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Installing license key
 */
class InstallingLicenseKey extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  null|string  $key  License key data.
     * @param  null|string  $code  Activation code.
     * @param  null|bool  $additional  It specifies if the key that will be installed is an additional key.
     */
    public function __construct(
        protected ?string $key = null,
        protected ?string $code = null,
        protected ?bool $additional = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter(['key' => $this->key, 'code' => $this->code, 'additional' => $this->additional]);
    }

    public function resolveEndpoint(): string
    {
        return '/server/license';
    }
}
