<?php

declare(strict_types=1);

namespace NPIRegistry\IndividualProviders;

use NPIRegistry\Api\HttpClient;
use NPIRegistry\Static\Constants;

class IndividualFinder
{
	/**
	 * Validate an individual NPI number exists in the NPI Registry
	 *
	 * @param string $npiNumber
	 * @return bool
	 */
	public function isValid(string $npiNumber): bool
	{
		$response = HttpClient::sendRequest([
			'enumeration_type' => Constants::ENUMERATION_TYPE_INDIVIDUAL,
			'number' => $npiNumber,
		]);

		return !empty($response);
	}

	/**
	 * Lookup by individual name for people in the NPI Registry
	 *
	 * @param string $firstName
	 * @param string $lastName
	 * @param bool $exact
	 * @return array<NPIRegistry\IndividualProviders\Individual>
	 */
	public static function searchByName(string $firstName, string $lastName, bool $exact = true): array
	{
		$results = HttpClient::sendRequest([
			'enumeration_type' => Constants::ENUMERATION_TYPE_INDIVIDUAL,
			'first_name' => $firstName,
			'last_name' => $lastName,
			'use_first_name_alias' => $exact ? 'False' : 'True',
		]);

		return array_map(fn (array $result) => IndividualParser::parse($result), $results);
	}

	/**
	 * Lookup by individual name for people in the NPI Registry
	 *
	 * @param string $firstName
	 * @param string $lastName
	 * @param string $state
	 * @param bool $exact
	 * @return array<NPIRegistry\IndividualProviders\Individual>
	 */
	public static function searchByNameAndState(string $firstName, string $lastName, string $state, bool $exact = true): array
	{
		$results = HttpClient::sendRequest([
			'enumeration_type' => Constants::ENUMERATION_TYPE_INDIVIDUAL,
			'first_name' => $firstName,
			'last_name' => $lastName,
			'state' => $state,
			'use_first_name_alias' => $exact ? 'False' : 'True',
		]);

		return array_map(fn (array $result) => IndividualParser::parse($result), $results);
	}

	/**
	 * Lookup by individual npi number for people in the NPI Registry
	 *
	 * @param string $npiNumber
	 * @return array<NPIRegistry\IndividualProviders\Individual>
	 */
	public static function searchByNumber(string $npiNumber): array
	{
		$results = HttpClient::sendRequest([
			'enumeration_type' => Constants::ENUMERATION_TYPE_INDIVIDUAL,
			'number' => $npiNumber,
		]);

		return array_map(fn (array $result) => IndividualParser::parse($result), $results);
	}
}
