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
     * CreateFromImmutable
     *
     * @param MoneyImmutable $money Money
     *
     * @return Money
     */
    public static function createFromImmutable(MoneyImmutable $money): Money
    {
        return new static(
            $money->getValue(),
            $money->getCurrency(),
            $money->getCalculator()
        );
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
     * Calculator.
     *
     * @return Calculator
     */
    public function getCalculator(): Calculator
    {
        return $this->calculator;
    }
    
    /**
     * Addition.
     *
     * @param Money $money Money
     *
     * @return $this
     */
    public function add(Money $money): Money
    {
        $this->modify($this->getCalculator()->add($this, $money));
        
        return $this;
    }
    
    /**
     * Subtraction.
     *
     * @param Money $money Money
     *
     * @return $this
     */
    public function sub(Money $money): Money
    {
        $this->modify($this->getCalculator()->sub($this, $money));
        
        return $this;
    }
    
    /**
     * Multiplication.
     *
     * @param float $value Value
     *
     * @return $this
     */
    public function mul(float $value): Money
    {
        $this->modify($this->getCalculator()->mul($this, $value));
        
        return $this;
    }
    
    /**
     * Division.
     *
     * @param float $value Value
     *
     * @return $this
     */
    public function div(float $value): Money
    {
        $this->modify($this->getCalculator()->div($this, $value));
        
        return $this;
    }
    
    /**
     * Modify.
     *
     * @param float $value Value
     *
     * @return $this
     */
    protected function modify(float $value): Money
    {
        $this->value = $this->toAccuracy($value);
        
        return $this;
    }
    
    /**
     * To accuracy.
     *
     * @param float $value    Value
     *
     * @return float
     */
    protected function toAccuracy(float $value): float
    {
        return round($value, $this->getCurrency()->getDecimal());
    }
}
