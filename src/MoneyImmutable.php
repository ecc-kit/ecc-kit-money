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
     * @param int $value Value
     *
     * @return $this
     */
    protected function modify(int $value): MoneyImmutable
    {
        return new static(
            $value,
            $this->getCurrency(),
            $this->getCalculator(),
            $this->getFormatter()
        );
    }
}
