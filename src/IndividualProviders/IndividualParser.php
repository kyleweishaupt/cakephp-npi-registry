<?php

declare(strict_types=1);

namespace NPIRegistry\IndividualProviders;

use NPIRegistry\IndividualProviders\Individual;

class IndividualParser
{
	/**
	 * Turn an individual (person) result into a model
	 *
	 * @param array $result
	 * @return \NPIRegistry\IndividualProviders\Individual
	 */
	public static function parse(array $result): Individual
	{
		$e = new Individual();

		$e->name = $result['basic']['first_name'] . ' ' . $result['basic']['last_name'];
		$e->number = $result['number'] ?? '';
		$e->active = trim($result['basic']['status']) == 'A' ? true : false; // A

		$e->first_name = $result['basic']['first_name'] ?? '';
		$e->last_name = $result['basic']['last_name'] ?? '';
		$e->credential = $result['basic']['credential'] ?? '';
		$e->sole_proprietor = $result['basic']['sole_proprietor'] == 'NO' ? false : true;
		$e->gender = $result['basic']['gender'] ?? '';

		$e->created_epoch = intval($result['created_epoch']);
		$e->enumeration_date = $result['basic']['enumeration_date']; // YYYY-MM-DD

		$e->last_updated = $result['basic']['last_updated']; // YYYY-MM-DD
		$e->last_updated_epoch = intval($result['last_updated_epoch']);

		$e->enumeration_type = $result['enumeration_type']; // NPI-1 (Individual) / NPI-2 (Organization)

		$e->addresses = $result['addresses'];
		$e->identifiers = $result['identifiers'];
		$e->other_names = $result['other_names'];
		$e->taxonomies = $result['taxonomies'];

		return $e;
	}
}
