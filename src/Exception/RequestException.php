<?php

declare(strict_types=1);

namespace NPIRegistry\Exception;

use Cake\Core\Exception\CakeException;

class RequestException extends CakeException
{
	// Context data is interpolated into this format string.
	protected $_messageTemplate = 'There was an issue with a request to the NPPES NPI Registry Service.';

	// You can set a default exception code as well.
	protected $_defaultCode = 500;
}
