<?php

namespace TeamNifty\Plesk\Requests\Extensions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\StatusResponse;

/**
 * Install a new Extension
 */
class InstallNewExtension extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  null|string  $id  Installation by Identifier.
     * @param  null|string  $url  Installation by URL.
     * @param  null|string  $file  Installation by file.
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $url = null,
        protected ?string $file = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter(['id' => $this->id, 'url' => $this->url, 'file' => $this->file]);
    }

    public function resolveEndpoint(): string
    {
        return '/extensions';
    }
}
