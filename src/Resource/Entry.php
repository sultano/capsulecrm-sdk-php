<?php

namespace CapsuleCRM\Resource;

use CapsuleCRM\Model;

class Entry extends AbstractResource implements SearchableInterface
{
    use SearchableTrait;

    /**
     * @var string
     */
    protected $uri = 'entries';

    /**
     * @param Model\Entry $entry
     * @return array
     * @throws \CapsuleCRM\Exception\ApiException
     */
    public function create(Model\Entry $entry)
    {
        return $this->hydrate(
            $this->client->post($this->uri, $entry->toArray())['entry'],
            new Model\Entry()
        );
    }
}
