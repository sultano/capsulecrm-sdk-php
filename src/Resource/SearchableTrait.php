<?php

namespace CapsuleCRM\Resource;

trait SearchableTrait
{
    /**
     * @var string
     */
    protected $query;

    /**
     * @var int
     */
    protected $page = 1;

    /**
     * @var int
     */
    protected $perPage = 50;

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string $query
     * @return SearchableTrait
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return SearchableTrait
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return SearchableTrait
     */
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        return $this;
    }
}
