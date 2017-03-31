<?php
/**
 * User: zach
 * Date: 5/6/13
 * Time: 4:40 AM
 */

namespace TippingCanoeEs\Serializers;

interface SerializerInterface
{
    public function serialize($data);


    public function deserialize($data, $headers);
}