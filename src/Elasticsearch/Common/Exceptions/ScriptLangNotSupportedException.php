<?php
/**
 * User: zach
 * Date: 7/25/13
 * Time: 2:51 PM
 */


namespace TippingCanoeEs\Common\Exceptions;

/**
 * ScriptLangNotSupportedException
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class ScriptLangNotSupportedException extends BadRequest400Exception implements ElasticsearchException
{
}
