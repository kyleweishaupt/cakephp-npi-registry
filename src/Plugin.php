<?php

declare(strict_types=1);

namespace NPIRegistry;

use Cake\Core\BasePlugin;

/**
 * Plugin for NPI Registry
 */
class Plugin extends BasePlugin
{
	/**
	 * The name of this plugin
	 *
	 * @var string
	 */
	protected $name = 'NPIRegistry';

	/**
	 * Disable routes hook.
	 *
	 * @var bool
	 */
	protected $routesEnabled = false;

	/**
	 * Disable middleware hook.
	 *
	 * @var bool
	 */
	protected $middlewareEnabled = false;

	/**
	 * Disable console hook.
	 *
	 * @var bool
	 */
	protected $consoleEnabled = false;

	/**
	 * Disable bootstrap hook.
	 *
	 * @var bool
	 */
	protected $bootstrapEnabled = false;

	/**
	 * Register container services
	 *
	 * @var bool
	 */
	protected $servicesEnabled = false;
}
