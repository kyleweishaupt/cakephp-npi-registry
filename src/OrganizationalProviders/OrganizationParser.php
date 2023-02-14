<?php

declare(strict_types=1);

namespace NPIRegistry\OrganizationalProviders;

use NPIRegistry\OrganizationalProviders\Organization;

class OrganizationParser
{
	/**
	 * Turn an organization result into a model
	 *
	 * @param array $result
	 * @return \NPIRegistry\OrganizationalProviders\Organization
	 */
	public static function parse(array $result): Organization
	{
		$e = new Organization();

		$e->name = $result['basic']['organization_name'];
		$e->organization_name = $result['basic']['organization_name'];

		$e->number = $result['number'] ?? '';
		$e->organizational_subpart = trim($result['basic']['organizational_subpart']) == 'YES' ? true : false; // YES/NO
		$e->active = trim($result['basic']['status']) == 'A' ? true : false; // A

		$e->authorized_official_first_name = $result['basic']['authorized_official_first_name'] ?? null;
		$e->authorized_official_last_name = $result['basic']['authorized_official_last_name'] ?? null;
		$e->authorized_official_middle_name = $result['basic']['authorized_official_middle_name'] ?? null;
		$e->authorized_official_telephone_number = $result['basic']['authorized_official_telephone_number'] ?? null;
		$e->authorized_official_title_or_position = $result['basic']['authorized_official_title_or_position'] ?? null;
		$e->authorized_official_name_prefix = $result['basic']['authorized_official_name_prefix'] ?? null;

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
