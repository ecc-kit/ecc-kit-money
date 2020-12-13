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
    protected function modify(float $value): MoneyImmutable
    {
        return new static(
            $this->toAccuracy($value),
            $this->getCurrency(),
            $this->getCalculator()
        );
    }
}
