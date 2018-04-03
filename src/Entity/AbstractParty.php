<?php

namespace CapsuleCRM\Entity;

abstract class AbstractParty
{
    const TITLE_MR = 'Mr';
    const TITLE_MASTER = 'Master';
    const TITLE_MRS = 'Mrs';
    const TITLE_MISS = 'Miss';
    const TITLE_MS = 'Ms';
    const TITLE_DR = 'Dr';
    const TITLE_PROF = 'Prof';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $about;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AbstractParty
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    abstract public function getType();

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return AbstractParty
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
     * @return AbstractParty
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
     * @return AbstractParty
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @param string $about
     * @return AbstractParty
     */
    public function setAbout($about)
    {
        $this->about = $about;
        return $this;
    }
}
