<?php

namespace CapsuleCRM\Model;

class Entry extends AbstractModel
{
    const TYPE_NOTE = 'note';
    const TYPE_EMAIL = 'email';
    const TYPE_TASK = 'task';

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
    public $subject;

    /**
     * @var string
     */
    public $content;

    /**
     * @var Opportunity
     */
    public $opportunity;

    /**
     * @var AbstractParty
     */
    public $party;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Entry
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
     * @return Entry
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return Entry
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Entry
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return Opportunity
     */
    public function getOpportunity()
    {
        return $this->opportunity;
    }

    /**
     * @param Opportunity $opportunity
     * @return Entry
     */
    public function setOpportunity(Opportunity $opportunity)
    {
        $this->opportunity = $opportunity;
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
     * @return Entry
     */
    public function setParty(AbstractParty $party)
    {
        $this->party = $party;
        return $this;
    }
}
