<?php

namespace TeamNifty\Plesk\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use TeamNifty\Plesk\Enums\DnsRecordType;
use TeamNifty\Plesk\Requests\Dns\CreateDomainOrDomainAliasDnsRecord;
use TeamNifty\Plesk\Requests\Dns\DeleteDnsRecord;
use TeamNifty\Plesk\Requests\Dns\GetDnsRecord;
use TeamNifty\Plesk\Requests\Dns\GetDomainOrDomainAliasDnsRecords;
use TeamNifty\Plesk\Requests\Dns\UpdateDnsRecord;

class Dns extends BaseResource
{
    /**
     * @param  null|DnsRecordType  $type  The type of the DNS record
     * @param  null|string  $host  The IP address or name of a host, that will be used by DNS
     * @param  null|string  $value  The value that will be linked with the host value
     * @param  null|string  $opt  Optional information about the DNS record
     * @param  null|int  $ttl  The amount of time (in seconds) that slave DNS servers should store the record in a cache
     * @param  string  $domain  Filter by domain or domain alias name
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createDomainOrDomainAliasDnsRecord(
        ?DnsRecordType $type,
        ?string $host,
        ?string $value,
        ?string $opt,
        ?int $ttl,
        string $domain,
    ): Response {
        return $this->connector->send(new CreateDomainOrDomainAliasDnsRecord($type, $host, $value, $opt, $ttl, $domain));
    }

    /**
     * @param  int  $id  DNS record ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteDnsRecord(int $id): Response
    {
        return $this->connector->send(new DeleteDnsRecord($id));
    }

    /**
     * @param  int  $id  DNS record ID
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDnsRecord(int $id): Response
    {
        return $this->connector->send(new GetDnsRecord($id));
    }

    /**
     * @param  string  $domain  Filter by domain or domain alias name
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDomainOrDomainAliasDnsRecords(string $domain): Response
    {
        return $this->connector->send(new GetDomainOrDomainAliasDnsRecords($domain));
    }

    /**
     * @param  int  $id  DNS record ID
     * @param  null|int  $id  Unique identifier of the DNS record
     * @param  null|DnsRecordType  $type  The type of the DNS record
     * @param  null|string  $host  The IP address or name of a host, that will be used by DNS
     * @param  null|string  $value  The value that will be linked with the host value
     * @param  null|string  $opt  Optional information about the DNS record
     * @param  null|int  $ttl  The amount of time (in seconds) that slave DNS servers should store the record in a cache
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateDnsRecord(
        ?int $id = null,
        ?DnsRecordType $type = null,
        ?string $host = null,
        ?string $value = null,
        ?string $opt = null,
        ?int $ttl = null,
    ): Response {
        return $this->connector->send(new UpdateDnsRecord($id, $id, $type, $host, $value, $opt, $ttl));
    }
}
