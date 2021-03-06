<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace TippingCanoeEs\Endpoints\Snapshot\Repository;

use TippingCanoeEs\Endpoints\AbstractEndpoint;
use TippingCanoeEs\Common\Exceptions;

/**
 * Class Create
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Snapshot\Repository
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Create extends AbstractEndpoint
{
    // A repository name
    private $repository;


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
     * @param $repository
     *
     * @return $this
     */
    public function setRepository($repository)
    {
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;
        return $this;
    }


    /**
     * @throws \TippingCanoeEs\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'repository is required for Create'
            );
        }
        $repository = $this->repository;
        $uri   = "/_snapshot/$repository";

        if (isset($repository) === true) {
            $uri = "/_snapshot/$repository";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'master_timeout',
            'timeout',
        );
    }


    /**
     * @return array
     * @throws \TippingCanoeEs\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for Create Repository');
        }
        return $this->body;
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'PUT';
    }
}