<?php
/**
 * User: zach
 * Date: 6/17/13
 * Time: 2:46 PM
 */

namespace TippingCanoeEs\Common\Exceptions\Curl;

use TippingCanoeEs\Common\Exceptions\ElasticsearchException;
use TippingCanoeEs\Common\Exceptions\TransportException;

/**
 * Class CouldNotResolveHostException
 * @package Elasticsearch\Common\Exceptions\Curl
 */
class CouldNotResolveHostException extends TransportException implements ElasticsearchException
{
}
