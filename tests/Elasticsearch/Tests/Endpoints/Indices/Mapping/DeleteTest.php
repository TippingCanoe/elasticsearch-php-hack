<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 12:53 PM
 */

namespace TippingCanoeEs\Tests\Endpoints\Indices\Mapping;

use TippingCanoeEs\Common\Exceptions\RuntimeException;
use TippingCanoeEs\Endpoints\Indices\Mapping\Delete;
use Mockery as m;

/**
 * Class DeleteTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Mapping
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class DeleteTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndexOrType()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $index = new Delete($mockTransport);
        $index->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $index = new Delete($mockTransport);
        $index->setType('testType')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoType()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport');

        $index = new Delete($mockTransport);
        $index->setIndex('testIndex')->performRequest();

    }

    public function testValidDeleteWith()
    {

        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/testIndex/testType/_mapping',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')->setType('testType')
        ->performRequest();

    }


}