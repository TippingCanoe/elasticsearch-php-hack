<?php
/**
 * User: zach
 * Date: 6/17/13
 * Time: 3:14 PM
 */

namespace TippingCanoeEs\Common\Exceptions\Curl;

use TippingCanoeEs\Common\Exceptions\ElasticsearchException;
use TippingCanoeEs\Common\Exceptions\TransportException;

/**
 * Class CouldNotConnectToHost
 * @package Elasticsearch\Common\Exceptions\Curl
 */
class CouldNotConnectToHost extends TransportException implements ElasticsearchException
{
}
