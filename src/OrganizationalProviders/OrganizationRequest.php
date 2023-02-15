<?php

declare(strict_types=1);

namespace NPIRegistry\OrganizationalProviders;

/**
 * DTO of available request parameters for organizations
 * 
 * @see https://npiregistry.cms.hhs.gov/api-page
 */
class OrganizationRequest
{
	public string $number = '';
	public string $taxonomy_description = '';
	public string $organization_name = '';
	public string $address_purpose = '';
	public string $city = '';
	public string $state = '';
	public string $postal_code = '';
	public string $country_code = '';

	public function __construct(array $config = [])
	{
		$this->number = $config['number'] ?? '';
		$this->taxonomy_description = $config['taxonomy_description'] ?? '';
		$this->organization_name = $config['organization_name'] ?? '';
		$this->address_purpose = $config['address_purpose'] ?? '';
		$this->city = $config['city'] ?? '';
		$this->state = $config['state'] ?? '';
		$this->postal_code = $config['postal_code'] ?? '';
		$this->country_code = $config['country_code'] ?? '';
	}

	public function toArray(): array
	{
		return [
			'number' => $this->number,
			'taxonomy_description' => $this->taxonomy_description,
			'organization_name' => $this->organization_name,
			'address_purpose' => $this->address_purpose,
			'city' => $this->city,
			'state' => $this->state,
			'postal_code' => $this->postal_code,
			'country_code' => $this->country_code
		];
	}
}
