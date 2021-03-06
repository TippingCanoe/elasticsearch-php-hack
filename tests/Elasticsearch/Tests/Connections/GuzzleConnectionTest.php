<?php
/**
 * User: zach
 * Date: 5/7/13
 * Time: 2:19 PM
 */

namespace TippingCanoeEs\Tests\Connections;
use TippingCanoeEs;
use Mockery as m;
use TippingCanoeEs\Connections\GuzzleConnection;


/**
 * Class GuzzleConnectionTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/Connections
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class GuzzleConnectionTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @expectedException \TippingCanoeEs\Common\Exceptions\InvalidArgumentException
     */
    public function testNoGuzzleClient()
    {
        $hostDetails = array('host' => 'localhost', 'port' => 9200);
        $connectionParams = null;

        $log = m::mock('\Monolog\Logger')->shouldReceive('critical')->once()->getMock();

        $connection = new GuzzleConnection($hostDetails, $connectionParams, $log, $log);

    }

}