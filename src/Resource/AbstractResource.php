<?php

namespace CapsuleCRM\Resource;

use CapsuleCRM\Client;
use CapsuleCRM\Exception;
use Doctrine\Common\Inflector\Inflector;

abstract class AbstractResource
{
    /**
     * @var $client
     */
    protected $client;

    /**
     * AbstractResource constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $data
     * @param $object
     * @return mixed
     */
    public function hydrate(array $data, $object)
    {
        if ($this->isNumericArray($data)) {
            array_walk($data, function (&$item, $key) use ($object) {
                $item = $this->doHydrate($item, $object);
            });

            return $data;
        }

        return $this->doHydrate($data, $object);
    }

    /**
     * @param array $data
     * @param $object
     * @return mixed
     */
    private function doHydrate(array $data, $object)
    {
        if (!is_object($object)) {
            throw new Exception\RuntimeException(sprintf(
                '%s expects the provided $object to be a PHP object)',
                __METHOD__
            ));
        }

        foreach ($data as $property => $value) {
            // Skip empty values
            if (empty($value)) {
                continue;
            }

            $setterName = 'set' . ucfirst($property);
            if (is_callable([$object, $setterName]) && !is_array($value)) {
                $object->{$setterName}($value);
            } elseif (is_array($value)) {
                // Check if we have array of results; numeric array
                if ($this->isNumericArray($value)) {
                    $setterName = 'add' . ucfirst(Inflector::singularize($property));
                } else {
                    $value = [$value];
                }

                try {
                    $rc = new \ReflectionClass($object);
                    if ($rc->hasMethod($setterName) && $rc->getMethod($setterName)->getNumberOfRequiredParameters() === 1) {
                        $method = $rc->getMethod($setterName);
                        $parameterClass = current($method->getParameters())->getClass()->getName();

                        if ($property === 'party' && (new \ReflectionClass($parameterClass))->isAbstract()) {
                            $parameterClass = sprintf('%s\%s', $rc->getNamespaceName(), ucfirst($data['party']['type']));
                        }

                        foreach ($value as $v) {
                            $object->{$setterName}($this->{__FUNCTION__}($v, new $parameterClass()));
                        }
                    }
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        return $object;
    }

    /**
     * @param array $array
     * @return bool
     */
    private function isNumericArray(array $array)
    {
        return $array === [] ?: array_keys($array) === range(0, (count($array) - 1));
    }
}
