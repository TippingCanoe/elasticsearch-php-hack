<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace TippingCanoeEs\Tests\Endpoints\Cluster\Nodes;

use TippingCanoeEs\Common\Exceptions\InvalidArgumentException;
use TippingCanoeEs\Endpoints\Cluster\Nodes\HotThreads;
use Mockery as m;

/**
 * Class SettingsTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cluster\Node
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class HotThreadsTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testValidSettingsWithNodeID()
    {
        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()->once()
                         ->with(
                                 'GET',
                                 '/_cluster/nodes/abc/hotthreads',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new HotThreads($mockTransport);
        $action->setNodeID('abc')
        ->performRequest();

    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testValidSettingsWithInvalidNodeID()
    {
        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $action = new HotThreads($mockTransport);

        $nodeID = new \stdClass();

        $action->setNodeID($nodeID);;

    }

    public function testValidSettingsWithoutNodeID()
    {
        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_cluster/nodes/hotthreads',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new HotThreads($mockTransport);
        $action->performRequest();

    }
}