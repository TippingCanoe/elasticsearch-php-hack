<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace TippingCanoeEs\Endpoints;

use TippingCanoeEs\Endpoints\AbstractEndpoint;
use TippingCanoeEs\Common\Exceptions;

/**
 * Class Mget
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Mget extends AbstractEndpoint
{
    /**
     * @param array $body
     *
     * @throws \TippingCanoeEs\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }


        $this->body = $body;
        return $this;
    }



    /**
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $type = $this->type;
        $uri   = "/_mget";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_mget";
        } elseif (isset($index) === true) {
            $uri = "/$index/_mget";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_mget";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'fields',
            'preference',
            'realtime',
            'refresh',
            '_source',
            '_source_exclude',
            '_source_include',
        );
    }


    /**
     * @return array
     * @throws \TippingCanoeEs\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for MGet');
        }
        return $this->body;
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}