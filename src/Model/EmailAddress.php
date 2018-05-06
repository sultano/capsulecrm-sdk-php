<?php

namespace CapsuleCRM\Model;

class EmailAddress extends AbstractModel
{
    const TYPE_HOME = 'Home';
    const TYPE_WORK = 'Work';

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $address;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return EmailAddress
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return EmailAddress
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return EmailAddress
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }
}
