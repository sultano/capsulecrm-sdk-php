<?php

namespace CapsuleCRM\Resource;

use CapsuleCRM\Model;

class Opportunity extends AbstractResource implements SearchableInterface
{
    use SearchableTrait;

    /**
     * @var string
     */
    protected $uri = 'opportunities';

    /**
     * @var string
     */
    protected $searchUri = 'opportunities/search';

    /**
     * @return Model\Opportunity[]
     * @throws \CapsuleCRM\Exception\ApiException
     */
    public function search()
    {
        $opportunities = $this->client->get($this->searchUri, [
            'q' => $this->getQuery(),
            'page' => $this->getPage(),
            'perPage' => $this->getPerPage(),
        ])['opportunities'];

        return $this->hydrate($opportunities, new Model\Opportunity());
    }

    /**
     * @param Model\Opportunity $opportunity
     * @return Model\Opportunity
     * @throws \CapsuleCRM\Exception\ApiException
     */
    public function create(Model\Opportunity $opportunity)
    {
        return $this->hydrate(
            $this->client->post($this->uri, $opportunity->toArray())['opportunity'],
            new Model\Opportunity()
        );
    }
}
