<?php

namespace CapsuleCRM\Model;

class Opportunity extends AbstractModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var AbstractParty
     */
    public $party;

    /**
     * @var string
     */
    public $name;

    /**
     * @var Milestone
     */
    public $milestone;

    /**
     * @var \DateTime
     */
    public $closedOn;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Opportunity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return AbstractParty
     */
    public function getParty()
    {
        return $this->party;
    }

    /**
     * @param AbstractParty $party
     * @return Opportunity
     */
    public function setParty(AbstractParty $party)
    {
        $this->party = $party;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Opportunity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Milestone
     */
    public function getMilestone()
    {
        return $this->milestone;
    }

    /**
     * @param Milestone $milestone
     * @return Opportunity
     */
    public function setMilestone(Milestone $milestone)
    {
        $this->milestone = $milestone;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getClosedOn()
    {
        return $this->closedOn;
    }

    /**
     * @param \DateTime $closedOn
     * @return Opportunity
     */
    public function setClosedOn(\DateTime $closedOn = null)
    {
        $this->closedOn = $closedOn;
        return $this;
    }
}
