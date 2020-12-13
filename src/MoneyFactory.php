<?php

namespace EccKit\Money;

use EccKit\Money\Calculator\Calculator;

/**
 * Class MoneyFactory.
 */
class MoneyFactory
{
    /** @var Calculator Calculator */
    protected Calculator $calculator;
    
    /**
     * MoneyFactory constructor.
     *
     * @param Calculator $calculator Calculator
     */
    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }
    
    /**
     * Create.
     *
     * @param float    $value    Value
     * @param Currency $currency Currency
     *
     * @return Money
     */
    public function create(float $value, Currency $currency): Money
    {
        return new Money(
            $value,
            $currency,
            $this->getCalculator()
        );
    }
    
    /**
     * Calculator.
     *
     * @return Calculator
     */
    public function getCalculator(): Calculator
    {
        return $this->calculator;
    }
    
    /**
     * Default currency.
     *
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }
}
