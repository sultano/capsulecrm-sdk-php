<?php

namespace CapsuleCRM\Entity;

class Person extends AbstractParty
{
    /**
     * @var string
     */
    protected $type = 'person';

    /**
     * @var string
     */
    protected $jobTitle;

    /**
     * @var Organisation
     */
    protected $organisation;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getType();
    }

    /**
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param string $jobTitle
     * @return Person
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
        return $this;
    }

    /**
     * @return Organisation
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @param Organisation $organisation
     * @return Person
     */
    public function setOrganisation(Organisation $organisation)
    {
        $this->organisation = $organisation;
        return $this;
    }
}
