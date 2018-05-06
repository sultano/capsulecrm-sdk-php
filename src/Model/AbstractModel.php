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
                $item = $item->toArray();
            } elseif (is_object($item)) {
                $item = null;
                trigger_error("Object not instance of ModelInterface found", E_USER_WARNING);
            }
        });

        return array_filter(array_map(function ($value) {
            return (is_array($value) ? array_filter($value) : $value);
        }, $vars));
    }
}
