<?php

namespace CapsuleCRM\Model;

class Person extends AbstractParty
{
    const TITLE_MR = 'Mr';
    const TITLE_MASTER = 'Master';
    const TITLE_MRS = 'Mrs';
    const TITLE_MISS = 'Miss';
    const TITLE_MS = 'Ms';
    const TITLE_DR = 'Dr';
    const TITLE_PROF = 'Prof';

    /**
     * @var string
     */
    public $type = 'person';

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $jobTitle;

    /**
     * @var Organisation
     */
    public $organisation;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Person
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
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
