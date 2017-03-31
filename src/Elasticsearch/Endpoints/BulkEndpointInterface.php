<?php
/**
 * User: zach
 * Date: 7/22/13
 * Time: 8:57 PM
 */

namespace TippingCanoeEs\Endpoints;


use TippingCanoeEs\Serializers\SerializerInterface;
use TippingCanoeEs\Transport;

interface BulkEndpointInterface {
    public function __construct(Transport $transport, SerializerInterface $serializer);
}