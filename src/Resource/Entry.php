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
     * @return Model\Entry
     * @throws \CapsuleCRM\Exception\ApiException
     */
    public function create(Model\Entry $entry)
    {
        $response = $this->client->post($this->uri, [
            'entry' => $entry->toArray(),
        ]);

        return $this->hydrate($response['entry'], new Model\Entry());
    }
}
