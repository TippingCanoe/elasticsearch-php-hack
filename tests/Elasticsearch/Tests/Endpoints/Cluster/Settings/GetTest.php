<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 1:55 PM
 */

namespace TippingCanoeEs\Tests\Endpoints\Cluster\Settings;

use TippingCanoeEs\Common\Exceptions\InvalidArgumentException;
use TippingCanoeEs\Endpoints\Cluster\Settings\Get;
use Mockery as m;

/**
 * Class GetTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cluster\Settings
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class GetTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidGet()
    {
        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_cluster/settings',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->performRequest();

    }
}