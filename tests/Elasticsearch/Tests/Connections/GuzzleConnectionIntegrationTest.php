<?php
/**
 * User: zach
 * Date: 6/17/13
 * Time: 2:43 PM
 */

namespace TippingCanoeEs\Tests\Connections;
use TippingCanoeEs;
use TippingCanoeEs\Common\Exceptions\Curl;
use Guzzle\Http\Client;
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
class GuzzleConnectionIntegrationTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }


    /**
     * @expectedException Elasticsearch\Common\Exceptions\Curl\CouldNotResolveHostException
     */
    public function test5xxErrorBadHost()
    {
        $hostDetails = array('host' => 'localhost5', 'port' => 9200);

        $connectionParams['guzzleClient'] = new Client();

        $log = m::mock('\Monolog\Logger')->shouldReceive('error')->once()->getMock();

        $connection = new GuzzleConnection($hostDetails, $connectionParams, $log, $log);
        $ret = $connection->performRequest('GET', '/');

    }
}