<?php

namespace EccKit\Money;

/**
 * Class MoneyImmutable.
 */
class MoneyImmutable extends Money
{
    /**
     * Modify.
     *
     * @param float $value Value
     *
     * @return $this
     */
    protected function modify(float $value): Money
    {
        return new static(
            $value,
            $this->getCurrency(),
            $this->getCalculator()
        );
    }
}
