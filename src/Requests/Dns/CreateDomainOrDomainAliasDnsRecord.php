<?php

namespace TeamNifty\Plesk\Requests\Dns;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use TeamNifty\Plesk\Dto\DnsRecord;
use TeamNifty\Plesk\Enums\DnsRecordType;

/**
 * Create domain or domain alias DNS record
 */
class CreateDomainOrDomainAliasDnsRecord extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  null|DnsRecordType  $type  The type of the DNS record
     * @param  null|string  $host  The IP address or name of a host, that will be used by DNS
     * @param  null|string  $value  The value that will be linked with the host value
     * @param  null|string  $opt  Optional information about the DNS record
     * @param  null|int  $ttl  The amount of time (in seconds) that slave DNS servers should store the record in a cache
     * @param  string  $domain  Filter by domain or domain alias name
     */
    public function __construct(
        protected ?DnsRecordType $type,
        protected ?string $host,
        protected ?string $value,
        protected ?string $opt,
        protected ?int $ttl,
        protected string $domain,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return DnsRecord::from($response->json() ?? []);
    }

    public function defaultBody(): array
    {
        return [
            'type' => $this->type?->value,
            'host' => $this->host,
            'value' => $this->value,
            'opt' => $this->opt,
            'ttl' => $this->ttl,
        ];
    }

    public function defaultQuery(): array
    {
        return array_filter(['domain' => $this->domain]);
    }

    public function resolveEndpoint(): string
    {
        return '/dns/records';
    }
}
