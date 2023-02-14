# NPI Registry Plugin

[CakePHP](https://cakephp.org/) plugin for interacting with the [NPPES NPI Registry API](https://npiregistry.cms.hhs.gov/api-page).

## Intro

This is intended to be a few simple tools to make it easier to query and validate individual providers and organizations on the registry.

The API client is based on version 2.1 as it is the only supported/recommended version at the time of creation.

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

## License

Copyright (c) 2023-present, Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php).
