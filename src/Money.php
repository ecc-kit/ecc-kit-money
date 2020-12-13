<?php

namespace EccKit\Money;

use EccKit\Wallet\Calculator\Calculator;

/**
 * Class Money.
 */
class Money
{
    /** @var float Money value */
    protected float $value;
    /** @var Currency Currency */
    protected Currency $currency;
    /** @var Calculator Calculator */
    protected Calculator $calculator;
    
    /**
     * Money constructor.
     *
     * @param float      $value      Value
     * @param Currency   $currency   Currency
     * @param Calculator $calculator Calculator
     */
    public function __construct(float $value, Currency $currency, Calculator $calculator)
    {
        $this->currency = $currency;
        $this->calculator = $calculator;
        
        $this->value = $this->toAccuracy($value, $this->getCurrency()->getDecimal());
    }
    
    /**
     * Money value.
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
    
    /**
     * Currency.
     *
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }
    
    /**
     * To accuracy.
     *
     * @param float $value    Value
     * @param int   $accuracy Currency
     *
     * @return float
     */
    protected function toAccuracy(float $value, int $accuracy): float
    {
        return round($value, $accuracy);
    }
}
