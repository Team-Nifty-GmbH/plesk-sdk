<?php

declare(strict_types=1);

namespace TeamNifty\Plesk\Enums;

enum DnsRecordType: string
{
    case A = 'A';
    case AAAA = 'AAAA';
    case AXFR = 'AXFR';
    case CAA = 'CAA';
    case CNAME = 'CNAME';
    case DS = 'DS';
    case HTTPS = 'HTTPS';
    case MX = 'MX';
    case NS = 'NS';
    case PTR = 'PTR';
    case SOA = 'SOA';
    case SRV = 'SRV';
    case TLSA = 'TLSA';
    case TXT = 'TXT';
}
