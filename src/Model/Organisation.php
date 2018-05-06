<?php

namespace CapsuleCRM\Model;

class Organisation extends AbstractParty
{
    /**
     * @var string
     */
    public $type = 'organisation';

    /**
     * @var string
     */
    public $name;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Organisation
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
