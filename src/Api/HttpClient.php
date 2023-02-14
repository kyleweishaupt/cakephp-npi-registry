<?php

declare(strict_types=1);

namespace NPIRegistry\Api;

use Cake\Http\Client;
use NPIRegistry\Exception\RequestException;
use NPIRegistry\Exception\ServiceUnavailableException;

class HttpClient
{
	// API Endpoint
	public const API_PROTOCOL = 'https';
	public const API_HOSTNAME = 'npiregistry.cms.hhs.gov';
	public const API_BASE_PATH = '/api';
	public const API_VERSION = 2.1;
	public const API_PRETTY = false;

	/**
	 * Send a request to the CMS NPI Registry API and get array of results
	 *
	 * @param array $parameters
	 * @param int $page
	 * @param int $limit
	 * @return array
	 * @throws \NPIRegistry\Exception\ServiceUnavailableException
	 */
	public static function sendRequest(array $parameters, int $page = 1, int $limit = 25): array
	{
		$skip = ($page - 1) * $limit;

		$config = [
			'version' => self::API_VERSION,
			'limit' => $limit,
			'skip' => $skip,
			'pretty' => self::API_PRETTY
		];

		$apiClient = new Client([
			'host' => self::API_HOSTNAME,
			'scheme' => self::API_PROTOCOL,
			'basePath' => self::API_BASE_PATH,
		]);

		$mergedConfig = array_merge($config, $parameters);

		$response = $apiClient->get('/', $mergedConfig);

		if (!$response->isSuccess()) {
			throw new ServiceUnavailableException();
		}

		$json = $response->getJson();

		if (!empty($json['Errors'])) {
			self::handleErrors($json['Errors']);
		}

		if (empty($json['results'])) {
			return [];
		}

		return $json['results'];
	}

	/**
	 * Handle API response errors and transform into exception
	 * 
	 * @param array $errors 
	 * @return void 
	 * @throws \NPIRegistry\Exception\RequestException 
	 */
	private static function handleErrors(array $errors): void
	{
		$errors = array_column($errors, 'description');
		$message = implode(', ', $errors);

		throw new RequestException($message);
	}
}
