<?php

namespace TeamNifty\Plesk\Requests\Dns;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\StatusResponse;
use TeamNifty\Plesk\Enums\DnsRecordType;

/**
 * Update DNS record
 */
class UpdateDnsRecord extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param  int  $id  DNS record ID
     * @param  null|int  $id  Unique identifier of the DNS record
     * @param  null|DnsRecordType  $type  The type of the DNS record
     * @param  null|string  $host  The IP address or name of a host, that will be used by DNS
     * @param  null|string  $value  The value that will be linked with the host value
     * @param  null|string  $opt  Optional information about the DNS record
     * @param  null|int  $ttl  The amount of time (in seconds) that slave DNS servers should store the record in a cache
     */
    public function __construct(
        protected ?int $id = null,
        protected ?DnsRecordType $type = null,
        protected ?string $host = null,
        protected ?string $value = null,
        protected ?string $opt = null,
        protected ?int $ttl = null,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return StatusResponse::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return array_filter([
            'id' => $this->id,
            'type' => $this->type?->value,
            'host' => $this->host,
            'value' => $this->value,
            'opt' => $this->opt,
            'ttl' => $this->ttl,
        ]);
    }

    public function resolveEndpoint(): string
    {
        return "/dns/records/{$this->id}";
    }
}
