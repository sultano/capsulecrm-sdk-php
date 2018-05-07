<?php

namespace CapsuleCRM\Model;

abstract class AbstractModel implements ModelInterface
{
    /**
     * @return array
     */
    public function toArray()
    {
        $vars = get_object_vars($this);

        array_walk_recursive($vars, function (&$item, $key) {
            if ($item instanceof ModelInterface) {
                $item = array_filter((array)$item);
            } elseif (is_object($item)) {
                $item = null;
                trigger_error("Object not instance of ModelInterface found", E_USER_WARNING);
            }
        });

        return array_filter($vars);
    }
}
