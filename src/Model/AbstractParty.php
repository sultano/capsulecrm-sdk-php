<?php

namespace CapsuleCRM\Model;

abstract class AbstractParty extends AbstractModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $about;

    /**
     * @var PhoneNumber[]
     */
    public $phoneNumbers = [];

    /**
     * @var EmailAddress[]
     */
    public $emailAddresses = [];

    /**
     * @var string
     */
    public $pictureURL;

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

    /**
     * @return PhoneNumber[]
     */
    public function getPhoneNumbers()
    {
        return $this->phoneNumbers;
    }

    /**
     * @param PhoneNumber $phoneNumber
     * @return AbstractParty
     */
    public function addPhoneNumber(PhoneNumber $phoneNumber)
    {
        $this->phoneNumbers[] = $phoneNumber;
        return $this;
    }

    /**
     * @return EmailAddress[]
     */
    public function getEmailAddresses()
    {
        return $this->emailAddresses;
    }

    /**
     * @param EmailAddress $emailAddress
     * @return AbstractParty
     */
    public function addEmailAddress(EmailAddress $emailAddress)
    {
        $this->emailAddresses[] = $emailAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getPictureURL()
    {
        return $this->pictureURL;
    }

    /**
     * @param string $pictureURL
     * @return AbstractParty
     */
    public function setPictureURL($pictureURL)
    {
        $this->pictureURL = $pictureURL;
        return $this;
    }
}
