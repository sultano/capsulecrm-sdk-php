<?php

namespace CapsuleCRM\Resource;

use CapsuleCRM\Model\AbstractParty;
use CapsuleCRM\Model\Opportunity;
use CapsuleCRM\Model\Organisation;
use CapsuleCRM\Model\Person;

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
     * @var string
     */
    protected $searchOpportunityUri = 'parties/%d/opportunities';

    /**
     * @return AbstractParty[]
     * @throws \CapsuleCRM\Exception\ApiException
     */
    public function search()
    {
        $parties = $this->client->get($this->searchUri, [
            'q' => $this->getQuery(),
            'page' => $this->getPage(),
            'perPage' => $this->getPerPage(),
        ])['parties'];

        array_walk($parties, function (&$item, $key) {
            $object = $item['type'] == 'person' ? new Person() : new Organisation();
            $item = $this->hydrate($item, $object);
        });

        return $parties;
    }

    /**
     * @param AbstractParty $party
     * @return Opportunity[]
     * @throws \CapsuleCRM\Exception\ApiException
     */
    public function searchOpportunities(AbstractParty $party)
    {
        $opportunities = $this->client->get(sprintf($this->searchOpportunityUri, $party->getId()), [
            'q' => $this->getQuery(),
            'page' => $this->getPage(),
            'perPage' => $this->getPerPage(),
        ])['opportunities'];

        return $this->hydrate($opportunities, new Opportunity());
    }

    /**
     * @param AbstractParty $party
     * @return AbstractParty
     * @throws \CapsuleCRM\Exception\ApiException
     */
    public function create(AbstractParty $party)
    {
        $response = $this->client->post($this->uri, [
            'party' => $party->toArray(),
        ]);
        $object = $party->getType() == 'person' ? new Person() : new Organisation();

        return $this->hydrate($response['party'], $object);
    }
}
