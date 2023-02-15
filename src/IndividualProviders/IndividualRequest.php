<?php

declare(strict_types=1);

namespace NPIRegistry\IndividualProviders;

/**
 * DTO of available request parameters for individuals
 * 
 * @see https://npiregistry.cms.hhs.gov/api-page
 */
class IndividualRequest
{
	public string $number = '';
	public string $taxonomy_description = '';
	public string $first_name = '';
	public bool $use_first_name_alias = true;
	public string $last_name = '';
	public string $address_purpose = '';
	public string $city = '';
	public string $state = '';
	public string $postal_code = '';
	public string $country_code = '';

	public function __construct(array $config = [])
	{
		$this->number = $config['number'] ?? '';
		$this->taxonomy_description = $config['taxonomy_description'] ?? '';
		$this->first_name = $config['first_name'] ?? '';
		$this->use_first_name_alias = $config['use_first_name_alias'] ?? true;
		$this->last_name = $config['last_name'] ?? '';
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
			'first_name' => $this->first_name,
			'use_first_name_alias' => $this->use_first_name_alias ? 'True' : 'False', // API uses strings
			'last_name' => $this->last_name,
			'address_purpose' => $this->address_purpose,
			'city' => $this->city,
			'state' => $this->state,
			'postal_code' => $this->postal_code,
			'country_code' => $this->country_code
		];
	}
}
