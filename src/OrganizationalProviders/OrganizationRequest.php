<?php

declare(strict_types=1);

namespace NPIRegistry\OrganizationalProviders;

/**
 * @see https://npiregistry.cms.hhs.gov/api-page
 */
class OrganizationRequest
{
	public string $taxonomy_description;
	public string $first_name;
	public bool $use_first_name_alias;
	public string $last_name;
	public string $address_purpose;
	public string $city;
	public string $state;
	public string $postal_code;
	public string $country_code;
}
