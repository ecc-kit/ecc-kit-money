<?php

namespace EccKit\Money;

use EccKit\Wallet\Calculator\Calculator;

/**
 * Class MoneyFactory.
 */
class MoneyFactory
{
    /** @var ?Currency Currency */
    protected ?Currency $currency;
    /** @var Calculator Calculator */
    protected Calculator $calculator;
    
    /**
     * MoneyFactory constructor.
     *
     * @param Calculator    $calculator Calculator
     * @param null|Currency $currency   Default Currency
     */
    public function __construct(Calculator $calculator, ?Currency $currency = null)
    {
        $this->calculator = $calculator;
        $this->currency = $currency;
    }
    
    /**
     * Create.
     *
     * @param float         $value    Value
     * @param null|Currency $currency Currency
     *
     * @return Money
     */
    public function create(float $value, ?Currency $currency = null): Money
    {
        return new Money(
            $value,
            $currency ?? $this->getCurrency(),
            $this->getCalculator()
        );
    }
    
    /**
     * Money value.
     *
     * @return float
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
