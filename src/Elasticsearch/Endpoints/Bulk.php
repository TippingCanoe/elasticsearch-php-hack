<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace TippingCanoeEs\Endpoints;

use TippingCanoeEs\Endpoints\AbstractEndpoint;
use TippingCanoeEs\Common\Exceptions;
use TippingCanoeEs\Serializers\SerializerInterface;
use TippingCanoeEs\Transport;

/**
 * Class Bulk
 * @package Elasticsearch\Endpoints
 */
class Bulk extends AbstractEndpoint implements BulkEndpointInterface
{

    /**
     * @param Transport           $transport
     * @param SerializerInterface $serializer
     */
    public function __construct(Transport $transport, SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        parent::__construct($transport);
    }


    /**
     * @param string|array $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        if (is_array($body) === true) {
            $bulkBody = "";
            foreach ($body as $item) {
                $bulkBody .= $this->serializer->serialize($item)."\n";
            }
            $body = $bulkBody;
        }

        $this->body = $body;
        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {
       return $this->getOptionalURI('_bulk');

    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'consistency',
            'refresh',
            'replication',
            'type',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}