<?php

namespace CapsuleCRM\Model;

class PhoneNumber extends AbstractModel
{
    const TYPE_HOME = 'Home';
    const TYPE_WORK = 'Work';
    const TYPE_MOBILE = 'Mobile';
    const TYPE_FAX = 'Fax';
    const TYPE_DIRECT = 'Direct';

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
    public $number;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PhoneNumber
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
     * @return PhoneNumber
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return PhoneNumber
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }
}
