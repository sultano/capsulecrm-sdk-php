<?php

namespace CapsuleCRM\Resource;

interface SearchableInterface
{
    /**
     * @return string
     */
    public function getQuery();

    /**
     * @param string $query
     * @return self
     */
    public function setQuery($query);

    /**
     * @param int $perPage
     * @return self
     */
    public function setPerPage($perPage);

    /**
     * @param int $page
     * @return self
     */
    public function setPage($page);
}
