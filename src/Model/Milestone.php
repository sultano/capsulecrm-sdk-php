<?php

namespace CapsuleCRM\Model;

class Milestone extends AbstractModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Milestone
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
