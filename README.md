# Plesk PHP SDK

**A modern PHP SDK for the Plesk RESTful API, built with Saloon**

## 📋 Description

This SDK provides a clean, intuitive interface for interacting with the Plesk API in PHP applications. Built on top of Saloon HTTP client, it offers a robust and developer-friendly way to manage Plesk servers programmatically.

### Key Features

- 🚀 **Full Plesk API Coverage** - Complete implementation of Plesk's RESTful API v2
- 🏗️ **Built with Saloon** - Leveraging the powerful Saloon HTTP client for reliable API interactions
- 🔧 **Laravel Integration** - First-class Laravel support with Service Provider, Facade, and helper functions
- 📦 **Standalone Usage** - Can be used in any PHP project, not just Laravel
- 🎯 **Type-Safe** - Full PHP 8.2+ type hints and enums for better IDE support
- 📊 **DTO Support** - Structured data transfer objects using Spatie's Laravel Data package
- ⚡ **Auto-generated** - Generated from OpenAPI specification for accuracy and completeness
- 🔄 **Configurable** - SSL verification, timeouts, and retry logic configuration
- 🧪 **Testable** - Built with testing in mind, easily mockable with Saloon's testing utilities

### Supported Resources

- **Domains** - Full domain lifecycle management
- **Clients** - Customer and reseller account management  
- **Databases** - MySQL/PostgreSQL database and user management
- **DNS** - DNS zone and record management
- **FTP Users** - FTP account management
- **Extensions** - Plesk extension management
- **Server** - Server configuration and information
- **CLI** - Command line operations
- **Auth** - API key and authentication management

### Requirements

- PHP 8.2+
- Laravel 11.x or 12.x (optional, for Laravel integration)
- Plesk server with API access enabled

## Installation

```bash
composer require team-nifty/plesk-sdk
```

## Configuration

### Laravel

The package will auto-register the service provider. Publish the config file:

```bash
php artisan vendor:publish --tag=plesk-config
```

Add your Plesk credentials to your `.env` file:

```env
PLESK_URL=https://your-plesk-server.com:8443
PLESK_USERNAME=admin
PLESK_PASSWORD=your-password
PLESK_API_KEY=your-api-key
PLESK_VERIFY_SSL=true
PLESK_TIMEOUT=30
PLESK_RETRY_TIMES=3
PLESK_RETRY_SLEEP=100
```

### Usage in Laravel

Using the Helper Function:

```php
// List all domains
$domains = plesk()->domains()->listAllDomains()->send()->json();

// Create a new domain
$domain = plesk()->domains()->createNewDomain(
    name: 'example.com',
    hostingType: \TeamNifty\Plesk\Enums\DomainRequestHostingType::virtual,
    ownerClientId: 1
)->send();

// Get domain details
$domain = plesk()->domains()->domainDetails(id: 123)->send()->dto();
```

Using the Facade:

```php
use TeamNifty\Plesk\Facades\Plesk;

// List all domains
$domains = Plesk::domains()->listAllDomains()->send()->json();

// Create a new domain
$domain = Plesk::domains()->createNewDomain(
    name: 'example.com',
    hostingType: \TeamNifty\Plesk\Enums\DomainRequestHostingType::virtual,
    ownerClientId: 1
)->send();

// Get domain details
$domain = Plesk::domains()->domainDetails(id: 123)->send()->dto();
```

Using dependency injection:

```php
use TeamNifty\Plesk\Plesk;

class PleskController extends Controller
{
    public function __construct(
        private Plesk $plesk
    ) {}

    public function index()
    {
        $domains = $this->plesk->domains()->listAllDomains()->send()->json();
        
        return view('domains.index', compact('domains'));
    }
}
```

### Standalone Usage

```php
use TeamNifty\Plesk\Plesk;

$plesk = new Plesk(
    url: 'https://your-plesk-server.com:8443',
    username: 'admin',
    password: 'your-password',
    apiKey: 'your-api-key'
);

// List all clients
$clients = $plesk->clients()->listAllClients()->send()->json();

// Create a new client
$client = $plesk->clients()->createNewClientAccount(
    login: 'john.doe',
    email: 'john@example.com',
    type: \TeamNifty\Plesk\Enums\ClientType::CUSTOMER
)->send()->dto();
```

## Available Resources

- **Auth** - Authentication and API key management
- **Cli** - Command line interface operations
- **Clients** - Client account management
- **Databases** - Database and database user management
- **Dns** - DNS record management
- **Domains** - Domain management
- **Extensions** - Extension management
- **FtpUsers** - FTP user management
- **Server** - Server configuration and information

## Examples

### Working with Domains

```php
use TeamNifty\Plesk\Facades\Plesk;
use TeamNifty\Plesk\Enums\DomainRequestHostingType;

// Create a domain with hosting
$domain = Plesk::domains()->createNewDomain(
    name: 'example.com',
    description: 'My website',
    hostingType: DomainRequestHostingType::virtual,
    hostingSettings: [
        'ftp_login' => 'example_ftp',
        'ftp_password' => 'secure_password123'
    ],
    ownerClientId: 1
)->send()->dto();

// Update domain
$updated = Plesk::domains()->updateDomain(
    id: $domain->id,
    description: 'Updated description'
)->send()->dto();

// Get domain status
$status = Plesk::domains()->getDomainStatus(id: $domain->id)->send()->dto();

// Delete domain
Plesk::domains()->deleteDomain(id: $domain->id)->send();
```

### Working with Databases

```php
use TeamNifty\Plesk\Facades\Plesk;
use TeamNifty\Plesk\Enums\DatabaseType;

// Create a database
$database = Plesk::databases()->createDatabase(
    name: 'myapp_db',
    type: DatabaseType::mysql,
    parentDomainId: 123,
    serverId: 1
)->send()->dto();

// Create database user
$dbUser = Plesk::databases()->createDatabaseUser(
    login: 'myapp_user',
    password: 'secure_password',
    databaseId: $database->id
)->send()->dto();

// List all databases
$databases = Plesk::databases()->getDatabases()->send()->json();
```

### Working with DNS

```php
use TeamNifty\Plesk\Facades\Plesk;
use TeamNifty\Plesk\Enums\DnsRecordType;

// Get DNS records for a domain
$records = Plesk::dns()->getDomainOrDomainAliasDnsRecords(
    domainId: 123
)->send()->json();

// Create a DNS record
$record = Plesk::dns()->createDomainOrDomainAliasDnsRecord(
    domainId: 123,
    type: DnsRecordType::A,
    host: 'subdomain',
    value: '192.168.1.100'
)->send()->dto();

// Update DNS record
$updated = Plesk::dns()->updateDnsRecord(
    dnsRecordId: $record->id,
    value: '192.168.1.101'
)->send()->dto();

// Delete DNS record
Plesk::dns()->deleteDnsRecord(dnsRecordId: $record->id)->send();
```

## Error Handling

```php
use Saloon\Exceptions\Request\RequestException;

try {
    $domain = Plesk::domains()->domainDetails(id: 999)->send()->dto();
} catch (RequestException $e) {
    $status = $e->getStatus(); // HTTP status code
    $response = $e->getResponse(); // Saloon Response object
    $body = $e->getResponse()->body(); // Response body
    
    // Handle the error
    Log::error('Plesk API error', [
        'status' => $status,
        'message' => $body
    ]);
}
```

## Testing

For testing, you can mock the Plesk client:

```php
use TeamNifty\Plesk\Plesk;
use Saloon\Http\Faking\MockResponse;
use Saloon\Laravel\Facades\Saloon;

// Mock specific requests
Saloon::fake([
    'domains' => MockResponse::make(['id' => 1, 'name' => 'example.com'], 200),
]);

// Your test code
$domain = Plesk::domains()->listAllDomains()->send();

// Assert the request was sent
Saloon::assertSent(function ($request) {
    return $request instanceof \TeamNifty\Plesk\Requests\Domains\ListAllDomains;
});
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Support

For issues, questions, or suggestions, please use the [GitHub Issues](https://github.com/team-nifty/plesk-sdk/issues) page.

## License

This package is open-source software licensed under the MIT license.

---

**Tags**: `plesk`, `api`, `sdk`, `php`, `laravel`, `saloon`, `rest-api`, `plesk-api`, `server-management`, `hosting`, `web-hosting`