<?php

declare(strict_types=1);

namespace NPIRegistry;

use NPIRegistry\IndividualProviders\IndividualFinder;
use NPIRegistry\OrganizationalProviders\OrganizationFinder;

/**
 * CMS NPI Registry Service
 */
class NpiRegistryService
{
	/**
	 * Find individuals (people)
	 * 
	 * @return IndividualFinder 
	 */
	public static function individuals(): IndividualFinder
	{
		return new IndividualFinder();
	}

	/**
	 * Find organizations (companies)
	 * 
	 * @return OrganizationFinder 
	 */
	public static function organizations(): OrganizationFinder
	{
		return new OrganizationFinder();
	}
}
