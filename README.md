# NPI Registry Plugin

[CakePHP](https://cakephp.org/) plugin for interacting with the [NPPES NPI Registry API](https://npiregistry.cms.hhs.gov/api-page).

## Intro

This is intended to be a few simple tools to make it easier to query and validate individual providers and organizations on the registry.

The package is mainly a wrapper for converting requests and responses from the API into PHP classes.

The API client is based on version 2.1 as it is the only supported/recommended version at the time of creation.

## Disclaimer

This package is NOT affiliated with CMS and/or the U.S. government in any way, shape or form.
This is simply a PHP abstraction to a public and free API provided by CMS.

There is no warranty whatsoever and using this package is entirely at your own risk.
Any nefarious or malicious use is strictly forbidden.

## Install

Using [Composer](https://getcomposer.org/) to install:

```
composer require kyleweishaupt/cakephp-npi-registry
```

Then update `src/Application.php`:

```php
public function bootstrap()
{
    $this->addPlugin('NPIRegistry');
}
```

## Usage

To Do: Improve this.

```php
use NPIRegistry\NPIRegistryService;

NPIRegistryService::individuals()->searchByName(string $name);
NPIRegistryService::organizations()->searchByName(string $name);
```

## Contributing

This may or may not be maintained in the future.

If you need this functionality for a production environment, I highly recommend forking the repository.

## License

Copyright (c) 2023-present, Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php).
