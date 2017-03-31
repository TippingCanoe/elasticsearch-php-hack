<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace TippingCanoeEs\Tests\Endpoints\Cluster;

use TippingCanoeEs\Common\Exceptions\InvalidArgumentException;
use TippingCanoeEs\Endpoints\Cluster\State;
use Mockery as m;

/**
 * Class StateTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cluster
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class StateTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testValidState()
    {
        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_cluster/state',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new State($mockTransport);
        $action->performRequest();

    }
}