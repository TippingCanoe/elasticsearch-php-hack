<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace TippingCanoeEs\Tests\Endpoints\Cluster\Node;

use TippingCanoeEs\Common\Exceptions\InvalidArgumentException;
use TippingCanoeEs\Endpoints\Cluster\Nodes\Shutdown;
use Mockery as m;

/**
 * Class ShutdownTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cluster\Node
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class ShutdownTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testValidSettingsWithNodeID()
    {
        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()->once()
                         ->with(
                                 'POST',
                                 '/_cluster/nodes/abc/_shutdown',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Shutdown($mockTransport);
        $action->setNodeID('abc')
        ->performRequest();

    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testValidSettingsWithInvalidNodeID()
    {
        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $action = new Shutdown($mockTransport);

        $nodeID = new \stdClass();

        $action->setNodeID($nodeID)
        ->performRequest();

    }

    public function testValidSettingsWithoutNodeID()
    {
        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/_shutdown',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Shutdown($mockTransport);
        $action->performRequest();

    }
}