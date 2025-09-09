<?php

namespace TeamNifty\Plesk\Requests\Cli;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\CliCallResponse;

/**
 * Execute command
 */
class ExecuteCommand extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  string  $id  Command identifier
     */
    public function __construct(
        protected string $id,
        protected ?array $params = null,
        protected ?array $env = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return CliCallResponse::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter(['params' => $this->params, 'env' => $this->env]);
    }

    public function resolveEndpoint(): string
    {
        return "/cli/{$this->id}/call";
    }
}
