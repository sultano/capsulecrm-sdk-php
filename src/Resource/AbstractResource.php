<?php

namespace CapsuleCRM\Resource;

use CapsuleCRM\Client;

abstract class AbstractResource
{
    /**
     * @var $client
     */
    protected $client;

    /**
     * AbstractResource constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
