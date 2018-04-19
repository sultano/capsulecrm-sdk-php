<?php

namespace CapsuleCRM\Resource;

class Party extends AbstractResource implements SearchableInterface
{
    use SearchableTrait;

    /**
     * @var string
     */
    protected $uri = 'parties';

    /**
     * @var string
     */
    protected $searchUri = 'parties/search';

    /**
     * @return array
     * @throws \CapsuleCRM\Exception\ApiException
     */
    public function search()
    {
        return $this->client->get($this->searchUri, [
            'q' => $this->getQuery(),
            'page' => $this->getPage(),
            'perPage' => $this->getPerPage(),
        ])['parties'];
    }
}
