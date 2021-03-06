<?php
/**
 * User: zach
 * Date: 7/23/14
 * Time: 2:25 PM
 */

namespace TippingCanoeEs\Endpoints\Template;

use TippingCanoeEs\Endpoints\AbstractEndpoint;
use TippingCanoeEs\Common\Exceptions;

/**
 * Class Delete
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Template
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Delete extends AbstractEndpoint
{

    /**
     * @throws \TippingCanoeEs\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for Delete'
            );
        }
        $templateId   = $this->id;
        $uri  = "/_search/template/$templateId";

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array();
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'DELETE';
    }
}