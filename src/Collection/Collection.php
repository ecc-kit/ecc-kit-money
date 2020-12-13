<?php

namespace EccKit\Money\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;
use Throwable;

/**
 *
 * Class Collection.
 */
abstract class Collection extends ArrayCollection
{
    /**
     * {@inheritdoc}
     *
     * ArrayCollection constructor.
     *
     * @param array $elements Elements
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $elements = [])
    {
        foreach ($elements as $element) {
            $this->resultHandler($this->validateElement($element));
        }
        
        parent::__construct($elements);
    }
    
    /**
     * {@inheritdoc}
     *
     * @param mixed $element Элемент
     *
     * @throws ArgumentException
     *
     * @return bool|true
     */
    final public function add($element): bool
    {
        try {
            $this->validateElement($element);
        } catch (Throwable $e) {
            throw new ArgumentException(
                sprintf(
                    'instance of %s expected',
                    $e->getMessage(),
                )
            );
        }
        
        return parent::add($element);
    }
    
    /**
     * Search by field.
     *
     * @param string $field
     * @param mixed  $value
     *
     * @return null|mixed
     */
    public function findByField(string $field, $value)
    {
        $expr = new Comparison($field, '=', $value);
        $criteria = new Criteria();
        $criteria->where($expr);

        return $this->matching($criteria)->first();
    }
    
    /**
     * Element type check.
     *
     * @param mixed $element Element
     *
     * @throws InvalidArgumentException
     *
     * @return bool
     */
    abstract protected function validateElement($element): bool;
}
