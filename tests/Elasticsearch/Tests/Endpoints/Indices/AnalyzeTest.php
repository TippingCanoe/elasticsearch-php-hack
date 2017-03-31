<?php
/**
 * User: zach
 * Date: 6/6/13
 * Time: 11:10 AM
 */

namespace TippingCanoeEs\Tests\Endpoints\Indices;

use TippingCanoeEs\Common\Exceptions\InvalidArgumentException;
use TippingCanoeEs\Endpoints\Indices\Analyze;
use Mockery as m;

/**
 * Class AnalyzeTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class AnalyzeTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }

    public function testSetBody()
    {
        $body = 'abc';

        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 m::any(),
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Analyze($mockTransport);
        $action->setBody($body)
        ->performRequest();

    }

    public function testGetURIWithNoIndex()
    {

        $uri = '/_analyze';

        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Analyze($mockTransport);
        $action->performRequest();

    }

    public function testGetURIWithIndex()
    {
        $uri = '/testIndex/_analyze';

        $mockTransport = m::mock('\TippingCanoeEs\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Analyze($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}