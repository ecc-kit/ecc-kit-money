<?php

namespace EccKit\Money\Collection;

use EccKit\Money\Money;

/**
 * Class MoneyCollection.
 */
class MoneyCollection extends Collection
{
    /**
     * Validate element.
     *
     * @param Money $element Element
     *
     * @return bool
     */
    protected function validateElement($element): bool
    {
        if (!($element instanceof Money)) {
            throw new ArgumentException(Money::class);
        }
    }
}
