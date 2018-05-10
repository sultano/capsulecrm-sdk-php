<?php

namespace CapsuleCRM\Model;

abstract class AbstractModel implements ModelInterface
{
    /**
     * @return array
     */
    public function toArray()
    {
        return $this->doToArray($this);
    }

    /**
     * @param ModelInterface $model
     * @return array
     */
    private function doToArray(ModelInterface $model)
    {
        $vars = get_object_vars($model);

        array_walk_recursive($vars, function (&$item, $key) {
            if ($item instanceof ModelInterface) {
                $item = $this->doToArray($item);
            } elseif (is_object($item)) {
                $item = null;
                trigger_error("Object not instance of ModelInterface found", E_USER_WARNING);
            }
        });

        return array_filter($vars);
    }
}
