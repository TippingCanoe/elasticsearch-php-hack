<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 12:08 PM
 */

namespace TippingCanoeEs\Tests\Endpoint\Indicess;

use TippingCanoeEs\Common\Exceptions\InvalidArgumentException;
use TippingCanoeEs\Common\Exceptions\RuntimeException;
use TippingCanoeEs\Endpoints\Indices\Create;
use Mockery as m;

/**
 * Class CreateTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class CreateTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testSetBody()
    {
        $body = array('field' => 'value');

        $mockTransport = m::mock('\TippingCanoeEs\Transport');;

        $action = new Create($mockTransport);
        $action->setBody($body);;

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $action = new Create($mockTransport);
        $action->performRequest();

    }

    public function testValidCreateNoBody()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Create($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }

    public function testValidCreateWithBodyNoMappings()
    {

        $body = array('settings' => 'values');

        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Create($mockTransport);
        $action->setIndex('testIndex')
        ->setBody($body)
        ->performRequest();

    }

    public function testValidCreateWithBodyWithMappings()
    {

        $body = array(
            'settings' => 'values',
            'mappings' => 'values'
        );

        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/testIndex/',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Create($mockTransport);
        $action->setIndex('testIndex')
        ->setBody($body)
        ->performRequest();

    }

}