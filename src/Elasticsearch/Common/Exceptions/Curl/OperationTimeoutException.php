<?php
/**
 * User: zach
 * Date: 9/19/13
 * Time: 3:53 PM
 */

namespace TippingCanoeEs\Common\Exceptions\Curl;


use TippingCanoeEs\Common\Exceptions\ElasticsearchException;
use TippingCanoeEs\Common\Exceptions\TransportException;

/**
 * Class OperationTimeoutException
 * @package Elasticsearch\Common\Exceptions\Curl
 */
class OperationTimeoutException extends TransportException implements ElasticsearchException
{
}
