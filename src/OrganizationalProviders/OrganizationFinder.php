<?php

declare(strict_types=1);

namespace NPIRegistry\OrganizationalProviders;

use NPIRegistry\Api\HttpClient;
use NPIRegistry\OrganizationalProviders\OrganizationParser;
use NPIRegistry\Static\Constants;

class OrganizationFinder
{
	/**
	 * Validate an organization NPI number exists in the NPI Registry
	 *
	 * @param string $npiNumber
	 * @return bool
	 */
	public static function isValid(string $npiNumber): bool
	{
		$response = HttpClient::sendRequest([
			'enumeration_type' => Constants::ENUMERATION_TYPE_ORGANIZATION,
			'number' => $npiNumber,
		]);

		return !empty($response);
	}

	/**
	 * Lookup by NPI number for organizations in the NPI Registry
	 *
	 * @param string $npiNumber
	 * @return array<NPIRegistry\OrganizationalProviders\Organization>
	 */
	public static function searchByNumber(string $npiNumber): array
	{
		$results = HttpClient::sendRequest([
			'enumeration_type' => Constants::ENUMERATION_TYPE_ORGANIZATION,
			'number' => $npiNumber,
		]);

		return array_map(fn (array $result) => OrganizationParser::parse($result), $results);
	}

	/**
	 * Lookup by organization name for organizations in the NPI Registry
	 *
	 * @param string $name
	 * @param bool $exact
	 * @return array<NPIRegistry\OrganizationalProviders\Organization>
	 */
	public static function searchByName(string $name, bool $exact = false): array
	{
		$orgName = str_replace('*', '', $name);

		$results = HttpClient::sendRequest([
			'enumeration_type' => Constants::ENUMERATION_TYPE_ORGANIZATION,
			'organization_name' => $orgName . (!$exact && strlen($orgName) >= 2 ? '*' : ''),
		]);

		return array_map(fn (array $result) => OrganizationParser::parse($result), $results);
	}

	/**
	 * Lookup by organization name for organizations in the NPI Registry with state filter
	 *
	 * @param string $name
	 * @param string $state
	 * @param bool $exact
	 * @return array<NPIRegistry\OrganizationalProviders\Organization>
	 */
	public static function searchByNameAndState(string $name, string $state, bool $exact = false): array
	{
		$orgName = str_replace('*', '', $name);

		$results = HttpClient::sendRequest([
			'enumeration_type' => Constants::ENUMERATION_TYPE_ORGANIZATION,
			'organization_name' => $orgName . (!$exact && strlen($orgName) >= 2 ? '*' : ''),
			'state' => $state,
		]);

		return array_map(fn (array $result) => OrganizationParser::parse($result), $results);
	}
}
