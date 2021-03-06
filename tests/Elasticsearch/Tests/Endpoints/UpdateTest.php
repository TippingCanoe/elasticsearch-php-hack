<?php
/**
 * User: zach
 * Date: 6/4/13
 * Time: 1:02 PM
 */

namespace TippingCanoeEs\Tests\Endpoints;

use TippingCanoeEs\Common\Exceptions\RuntimeException;
use TippingCanoeEs\Endpoints\Update;
use Mockery as m;

/**
 * Class UpdateTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class UpdateTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    /**
     * @expectedException RuntimeException
     */
    public function testNoIndexTypeOrID()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $action = new Update($mockTransport);
        $action->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $action = new Update($mockTransport);
        $action->setType('testType')->setID('testID')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoType()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $action = new Update($mockTransport);
        $action->setIndex('testIndex')->setID('testID')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoID()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $action = new Update($mockTransport);
        $action->setType('testType')->setIndex('testIndex')->performRequest();

    }

    public function testValidUpdate()
    {
        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/testIndex/testType/testID/_update',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Update($mockTransport);
        $action->setIndex('testIndex')
        ->setType('testType')
        ->setID('testID')
        ->performRequest();

    }
}