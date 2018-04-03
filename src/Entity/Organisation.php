<?php

namespace CapsuleCRM\Entity;

class Organisation extends AbstractParty
{
    /**
     * @var string
     */
    protected $type = 'organisation';

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getType();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Organisation
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


}
